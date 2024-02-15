<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); 

if ( ! WC()->cart->is_empty() ) : 

			$cart_tot_is = WC()->cart->get_cart_contents_total();
			$min_cb_amount = woo_wallet()->settings_api->get_option( 'min_cart_amount', '_wallet_settings_credit', 0 );
			$cb_amount = woo_wallet()->settings_api->get_option( 'cashback_amount', '_wallet_settings_credit', 0 );
			$min_cb_amount2 = woo_wallet()->settings_api->get_option( 'min_cart_amount2', '_wallet_settings_credit', 0 );
			$cb_amount2 = woo_wallet()->settings_api->get_option( 'cashback_amount2', '_wallet_settings_credit', 0 );
			$percentage = ($cart_tot_is / $min_cb_amount2) * 100;
			$neg_amount = $min_cb_amount2 - $cart_tot_is;
			if($cart_tot_is < $min_cb_amount){
				$gift_amount = 0;
			}elseif ($cart_tot_is >= $min_cb_amount && $cart_tot_is <= $min_cb_amount2){
				$gift_amount = ($cb_amount / 100) * $cart_tot_is;
			}elseif($cart_tot_is >= $cb_amount2){
				$gift_amount = ($cb_amount2 / 100) * $cart_tot_is;
			}else{
				$gift_amount = 0;
			}

		if ( 0 !== woo_wallet()->settings_api->get_option( 'min_cart_amount', '_wallet_settings_credit', 10 ) && WC()->cart->get_total( 'edit' ) >= woo_wallet()->settings_api->get_option( 'min_cart_amount', '_wallet_settings_credit', 0 ) ) {
			?><span style="font-size: 12px; margin-top: 10px;"><span dir="rtl" class="woo-wallet-icon-wallet"></span> <?php echo 'اعتبار هدیه دریافتی: ' . number_format($gift_amount); ?> تومان</span><br><br><?php
		}else{
			
			?>
			<div class="progress-container" data-percentage='<?php echo round($percentage); ?>' style="margin-top: 15px;">
				<div class="percentage2" style="left: 94%; position: absolute; margin-top: -20px; font-size: 14px; color: #d9d9d9; font-size: 12px;">مبلغ</div>
			  	<div class="percentage1" style="left: 40%; position: absolute; margin-top: -20px; font-size: 14px;"><?php echo number_format($min_cb_amount); ?><span style="font-size: 8px;">تومان</span></div>
				<div class="percentage2" style="left: 0%; position: absolute; margin-top: -20px; font-size: 14px;"><?php echo number_format($min_cb_amount2); ?><span style="font-size: 8px;">تومان</span></div>
				<div class="progress"></div>
				<div class="percentage" style="display:none;"></div>
				<div class="percentage2" style="left: 92%; position: absolute; margin-top: 5px; color: #d9d9d9; font-size: 12px;">هدیه</div>
				<div class="percentage1 percentage" style="left: 50%; position: absolute; margin-top: 5px;">%<?php echo $cb_amount; ?></div>
				<div class="percentage2 percentage" style="left: 10%; position: absolute; margin-top: 5px;">%<?php echo $cb_amount2; ?></div>
			</div>
			<br><br><br><span style="font-size: 12px; margin-top: 10px;"><span dir="rtl" class="woo-wallet-icon-wallet"></span> <?php echo 'اعتبار هدیه دریافتی: ' . number_format($gift_amount); ?> تومان</span><br><br>
			<?php
		}
		echo '<small>آیتم های اضافه شده به سبد خرید:</small><br><br>';
	?>
	
    <ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );
		$count = 0;
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$count++;
		   if ($count > 3) {
			 break;
		   }
			$_product   = apply_filters( 'woocommerce_cart_item_product',
				$cart_item['data'],
				$cart_item,
				$cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id',
				$cart_item['product_id'],
				$cart_item,
				$cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 &&
			     apply_filters( 'woocommerce_widget_cart_item_visible',
				     true,
				     $cart_item,
				     $cart_item_key ) ) {
				$product_name      = apply_filters( 'woocommerce_cart_item_name',
					$_product->get_name(),
					$cart_item,
					$cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail',
					$_product->get_image(),
					$cart_item,
					$cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price',
					WC()->cart->get_product_price( $_product ),
					$cart_item,
					$cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink',
					$_product->is_visible() ? $_product->get_permalink( $cart_item ) : '',
					$cart_item,
					$cart_item_key );
				?>
                <li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class',
					'mini_cart_item',
					$cart_item,
					$cart_item_key ) ); ?>">
					<?php
					echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'woocommerce_cart_item_remove_link',
						sprintf(
							'<a href="%s" class="remove remove_from_cart_button dfx aic jcc" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"></path>
                    </svg></a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							esc_attr__( 'Remove this item', 'woocommerce' ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						),
						$cart_item_key
					);
					?>

					<?php if ( empty( $product_permalink ) ) : ?>
                        <div class="item-body-content">
							<?php echo $thumbnail; ?>
                            <strong class="title-text">
								<?php echo wp_kses_post( $product_name ); ?>
                            </strong>
                        </div>
					<?php else : ?>
                        <a href="<?php echo esc_url( $product_permalink ); ?>"
                           class="product-thumbnail">
							<?php echo $thumbnail; ?>
                            <strong class="title-text">
								<?php echo wp_kses_post( $product_name ); ?>
                            </strong>
                        </a>
					<?php endif; ?>

					<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity',
						'<span class="quantity">' .
						sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) .
						'</span>',
						$cart_item,
						$cart_item_key ); ?>
                </li>
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
    </ul>

    <p class="woocommerce-mini-cart__total total">
		<?php
		/**
		 * Hook: woocommerce_widget_shopping_cart_total.
		 *
		 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
		 */
		do_action( 'woocommerce_widget_shopping_cart_total' );
		?>
    </p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

    <p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

<?php else : ?>

<?php get_template_part('parts/mini-cart/function'); ?>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
