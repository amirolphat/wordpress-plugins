<?php
/**
 * Plugin Name: Hawasil: Countdown for product 
 * Plugin URI: https://host.hawasil.com/
 * Description: place [show_draw_date] in product details to show the countdown
 * Author: Amir Olphat
 * Author URI: https://amirolphat.ir/
 * Version: 1.0
 */


function show_draw_date_shortcode() {
    global $post;
    $product_id = $post->ID;
    $draw_date = get_post_meta( $product_id, 'draw_date', true );
	$draw_date = '<h1 id="countdown">' . $draw_date . '</h1>
	<script>
		var countDownDate = new Date("' . $draw_date . '").getTime();

		var x = setInterval(function() {

		  var now = new Date().getTime();

		  var distance = countDownDate - now;

		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
		  + minutes + "m " + seconds + "s ";

		  if (distance < 0) {
			clearInterval(x);
			document.getElementById("countdown").innerHTML = "' . $draw_date . '";
		  }
		}, 1000);
	</script>	
	';
    return $draw_date;
}
add_shortcode( 'show_draw_date', 'show_draw_date_shortcode' );


function countdown_after_products_grid_title() {
	global $product;
	$productid = $product->get_id();
	$draw_date_pg = get_post_meta( $productid, 'draw_date', true );
	$draw_date_pg = 'Lottery countdown: <span id="countdownpg">' . $draw_date_pg . '</span>
	<script>
		var countDownDate = new Date("' . $draw_date_pg . '").getTime();
		var x = setInterval(function() {
		  var now = new Date().getTime();
		  var distance = countDownDate - now;
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		  document.getElementById("countdownpg").innerHTML = days + "d " + hours + "h "
		  + minutes + "m " + seconds + "s ";
		  if (distance < 0) {
			clearInterval(x);
			document.getElementById("countdownpg").innerHTML = "' . $draw_date_pg . '";
		  }
		}, 1000);
	</script>	<br><br>
	';
    echo $draw_date_pg;
}
add_action( 'woocommerce_after_shop_loop_item_title', 'countdown_after_products_grid_title' );


function add_custom_product_field() {
    echo '<div class="options_group">';
    woocommerce_wp_text_input( array(
        'id' => 'draw_date',
        'label' => __( 'lottery Time', 'woocommerce' ),
        'placeholder' => 'Example: 2024-01-01',
    ) );
    echo '</div>';
}
add_action( 'woocommerce_product_options_general_product_data', 'add_custom_product_field' );

function save_custom_product_field( $post_id ) {
    $draw_date = $_POST['draw_date'];
    if ( ! empty( $draw_date ) ) {
        update_post_meta( $post_id, 'draw_date', esc_attr( $draw_date ) );
    }
}
add_action( 'woocommerce_process_product_meta', 'save_custom_product_field' );
?>