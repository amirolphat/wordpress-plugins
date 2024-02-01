<?php
/**
 * Plugin Name: Hawasil: Lottery 
 * Plugin URI: https://host.hawasil.com/
 * Description: Draw among those who have registered an order from your WooCommerce!
 * Author: Amir Olphat
 * Author URI: https://amirolphat.ir/
 * Version: 1.0
 */
add_action( 'admin_menu', 'lottery_plugin_menu' );

function lottery_plugin_menu() {
    add_menu_page( 'Lottery', 'Lottery', 'edit_shop_orders', 'lottery', 'lottery_plugin_page', 'dashicons-tickets', 6 );
}

function lottery_plugin_page() {
	echo '<div class="pyro showafter" style="display: none;">
	  <div class="before"></div>
	  <div class="after"></div>
	</div>';
	echo "<style>
	body {
  	overflow: hidden;
	}

.pyro > .before, .pyro > .after {
  position: absolute;
  width: 4px;
  height: 4px;
  border-radius: 50%;
  box-shadow: 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff, 0 0 #fff;
  -moz-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
  -webkit-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
  -o-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
  -ms-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
  animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
}

.pyro > .after {
  -moz-animation-delay: 1.25s, 1.25s, 1.25s;
  -webkit-animation-delay: 1.25s, 1.25s, 1.25s;
  -o-animation-delay: 1.25s, 1.25s, 1.25s;
  -ms-animation-delay: 1.25s, 1.25s, 1.25s;
  animation-delay: 1.25s, 1.25s, 1.25s;
  -moz-animation-duration: 1.25s, 1.25s, 6.25s;
  -webkit-animation-duration: 1.25s, 1.25s, 6.25s;
  -o-animation-duration: 1.25s, 1.25s, 6.25s;
  -ms-animation-duration: 1.25s, 1.25s, 6.25s;
  animation-duration: 1.25s, 1.25s, 6.25s;
}

@-webkit-keyframes bang {
  to {
    box-shadow: -43px 37.6666666667px #00ffea, 224px -162.3333333333px #3300ff, 220px -20.3333333333px #ffd900, 233px -263.3333333333px #ff00dd, 232px -63.3333333333px #ff1500, -39px -54.3333333333px #fffb00, -121px -46.3333333333px #ff00b7, -194px -167.3333333333px #77ff00, -196px -107.3333333333px #00ff1e, 203px -209.3333333333px #0015ff, 98px -110.3333333333px #007bff, 5px -137.3333333333px #22ff00, -90px -153.3333333333px #ff9900, -30px -252.3333333333px #f7ff00, -8px -328.3333333333px #00ff62, 90px -236.3333333333px deepskyblue, 238px -73.3333333333px #ff005e, -15px 23.6666666667px #0073ff, -123px 52.6666666667px #00ffbb, 144px 51.6666666667px #001eff, -8px 18.6666666667px #ff0099, 240px -150.3333333333px #ff00dd, -119px 49.6666666667px #ffae00, -150px -175.3333333333px #fffb00, -9px -40.3333333333px #f200ff, 241px -261.3333333333px #ff00a2, 225px 0.6666666667px #62ff00, 53px -253.3333333333px #4400ff, 167px -157.3333333333px #9900ff, -15px -229.3333333333px #00ff4d, -207px -26.3333333333px #003cff, -128px -44.3333333333px #8c00ff, 196px -109.3333333333px #00aaff, -192px -66.3333333333px #00ffae, -247px -2.3333333333px #ff0084, -98px -174.3333333333px #ff00a6, 195px -161.3333333333px #ff00cc, -217px -109.3333333333px #ff1500, -132px 0.6666666667px #88ff00, 106px -321.3333333333px #8cff00, 158px -275.3333333333px #00ffb3, 236px 42.6666666667px #0051ff, -54px -150.3333333333px #8c00ff, 160px -263.3333333333px #bf00ff, -119px -331.3333333333px #0011ff, 16px 7.6666666667px #00ff2b, 91px -86.3333333333px #ff0040, -249px -251.3333333333px #ff002b, -208px -108.3333333333px #ff006a, 225px -214.3333333333px #33ff00, -19px -14.3333333333px #ff005e, 218px -254.3333333333px #ff6f00, -72px -208.3333333333px #77ff00, 244px -188.3333333333px #ff003c, -222px -99.3333333333px #c800ff, 125px -73.3333333333px #8000ff, -192px -295.3333333333px #006fff, -89px -15.3333333333px #ff5500, -36px 24.6666666667px #b300ff, 57px -330.3333333333px #ff00bf, -225px -32.3333333333px #00eeff;
  }
}
@-moz-keyframes bang {
  to {
    box-shadow: -43px 37.6666666667px #00ffea, 224px -162.3333333333px #3300ff, 220px -20.3333333333px #ffd900, 233px -263.3333333333px #ff00dd, 232px -63.3333333333px #ff1500, -39px -54.3333333333px #fffb00, -121px -46.3333333333px #ff00b7, -194px -167.3333333333px #77ff00, -196px -107.3333333333px #00ff1e, 203px -209.3333333333px #0015ff, 98px -110.3333333333px #007bff, 5px -137.3333333333px #22ff00, -90px -153.3333333333px #ff9900, -30px -252.3333333333px #f7ff00, -8px -328.3333333333px #00ff62, 90px -236.3333333333px deepskyblue, 238px -73.3333333333px #ff005e, -15px 23.6666666667px #0073ff, -123px 52.6666666667px #00ffbb, 144px 51.6666666667px #001eff, -8px 18.6666666667px #ff0099, 240px -150.3333333333px #ff00dd, -119px 49.6666666667px #ffae00, -150px -175.3333333333px #fffb00, -9px -40.3333333333px #f200ff, 241px -261.3333333333px #ff00a2, 225px 0.6666666667px #62ff00, 53px -253.3333333333px #4400ff, 167px -157.3333333333px #9900ff, -15px -229.3333333333px #00ff4d, -207px -26.3333333333px #003cff, -128px -44.3333333333px #8c00ff, 196px -109.3333333333px #00aaff, -192px -66.3333333333px #00ffae, -247px -2.3333333333px #ff0084, -98px -174.3333333333px #ff00a6, 195px -161.3333333333px #ff00cc, -217px -109.3333333333px #ff1500, -132px 0.6666666667px #88ff00, 106px -321.3333333333px #8cff00, 158px -275.3333333333px #00ffb3, 236px 42.6666666667px #0051ff, -54px -150.3333333333px #8c00ff, 160px -263.3333333333px #bf00ff, -119px -331.3333333333px #0011ff, 16px 7.6666666667px #00ff2b, 91px -86.3333333333px #ff0040, -249px -251.3333333333px #ff002b, -208px -108.3333333333px #ff006a, 225px -214.3333333333px #33ff00, -19px -14.3333333333px #ff005e, 218px -254.3333333333px #ff6f00, -72px -208.3333333333px #77ff00, 244px -188.3333333333px #ff003c, -222px -99.3333333333px #c800ff, 125px -73.3333333333px #8000ff, -192px -295.3333333333px #006fff, -89px -15.3333333333px #ff5500, -36px 24.6666666667px #b300ff, 57px -330.3333333333px #ff00bf, -225px -32.3333333333px #00eeff;
  }
}
@-o-keyframes bang {
  to {
    box-shadow: -43px 37.6666666667px #00ffea, 224px -162.3333333333px #3300ff, 220px -20.3333333333px #ffd900, 233px -263.3333333333px #ff00dd, 232px -63.3333333333px #ff1500, -39px -54.3333333333px #fffb00, -121px -46.3333333333px #ff00b7, -194px -167.3333333333px #77ff00, -196px -107.3333333333px #00ff1e, 203px -209.3333333333px #0015ff, 98px -110.3333333333px #007bff, 5px -137.3333333333px #22ff00, -90px -153.3333333333px #ff9900, -30px -252.3333333333px #f7ff00, -8px -328.3333333333px #00ff62, 90px -236.3333333333px deepskyblue, 238px -73.3333333333px #ff005e, -15px 23.6666666667px #0073ff, -123px 52.6666666667px #00ffbb, 144px 51.6666666667px #001eff, -8px 18.6666666667px #ff0099, 240px -150.3333333333px #ff00dd, -119px 49.6666666667px #ffae00, -150px -175.3333333333px #fffb00, -9px -40.3333333333px #f200ff, 241px -261.3333333333px #ff00a2, 225px 0.6666666667px #62ff00, 53px -253.3333333333px #4400ff, 167px -157.3333333333px #9900ff, -15px -229.3333333333px #00ff4d, -207px -26.3333333333px #003cff, -128px -44.3333333333px #8c00ff, 196px -109.3333333333px #00aaff, -192px -66.3333333333px #00ffae, -247px -2.3333333333px #ff0084, -98px -174.3333333333px #ff00a6, 195px -161.3333333333px #ff00cc, -217px -109.3333333333px #ff1500, -132px 0.6666666667px #88ff00, 106px -321.3333333333px #8cff00, 158px -275.3333333333px #00ffb3, 236px 42.6666666667px #0051ff, -54px -150.3333333333px #8c00ff, 160px -263.3333333333px #bf00ff, -119px -331.3333333333px #0011ff, 16px 7.6666666667px #00ff2b, 91px -86.3333333333px #ff0040, -249px -251.3333333333px #ff002b, -208px -108.3333333333px #ff006a, 225px -214.3333333333px #33ff00, -19px -14.3333333333px #ff005e, 218px -254.3333333333px #ff6f00, -72px -208.3333333333px #77ff00, 244px -188.3333333333px #ff003c, -222px -99.3333333333px #c800ff, 125px -73.3333333333px #8000ff, -192px -295.3333333333px #006fff, -89px -15.3333333333px #ff5500, -36px 24.6666666667px #b300ff, 57px -330.3333333333px #ff00bf, -225px -32.3333333333px #00eeff;
  }
}
@-ms-keyframes bang {
  to {
    box-shadow: -43px 37.6666666667px #00ffea, 224px -162.3333333333px #3300ff, 220px -20.3333333333px #ffd900, 233px -263.3333333333px #ff00dd, 232px -63.3333333333px #ff1500, -39px -54.3333333333px #fffb00, -121px -46.3333333333px #ff00b7, -194px -167.3333333333px #77ff00, -196px -107.3333333333px #00ff1e, 203px -209.3333333333px #0015ff, 98px -110.3333333333px #007bff, 5px -137.3333333333px #22ff00, -90px -153.3333333333px #ff9900, -30px -252.3333333333px #f7ff00, -8px -328.3333333333px #00ff62, 90px -236.3333333333px deepskyblue, 238px -73.3333333333px #ff005e, -15px 23.6666666667px #0073ff, -123px 52.6666666667px #00ffbb, 144px 51.6666666667px #001eff, -8px 18.6666666667px #ff0099, 240px -150.3333333333px #ff00dd, -119px 49.6666666667px #ffae00, -150px -175.3333333333px #fffb00, -9px -40.3333333333px #f200ff, 241px -261.3333333333px #ff00a2, 225px 0.6666666667px #62ff00, 53px -253.3333333333px #4400ff, 167px -157.3333333333px #9900ff, -15px -229.3333333333px #00ff4d, -207px -26.3333333333px #003cff, -128px -44.3333333333px #8c00ff, 196px -109.3333333333px #00aaff, -192px -66.3333333333px #00ffae, -247px -2.3333333333px #ff0084, -98px -174.3333333333px #ff00a6, 195px -161.3333333333px #ff00cc, -217px -109.3333333333px #ff1500, -132px 0.6666666667px #88ff00, 106px -321.3333333333px #8cff00, 158px -275.3333333333px #00ffb3, 236px 42.6666666667px #0051ff, -54px -150.3333333333px #8c00ff, 160px -263.3333333333px #bf00ff, -119px -331.3333333333px #0011ff, 16px 7.6666666667px #00ff2b, 91px -86.3333333333px #ff0040, -249px -251.3333333333px #ff002b, -208px -108.3333333333px #ff006a, 225px -214.3333333333px #33ff00, -19px -14.3333333333px #ff005e, 218px -254.3333333333px #ff6f00, -72px -208.3333333333px #77ff00, 244px -188.3333333333px #ff003c, -222px -99.3333333333px #c800ff, 125px -73.3333333333px #8000ff, -192px -295.3333333333px #006fff, -89px -15.3333333333px #ff5500, -36px 24.6666666667px #b300ff, 57px -330.3333333333px #ff00bf, -225px -32.3333333333px #00eeff;
  }
}
@keyframes bang {
  to {
    box-shadow: -43px 37.6666666667px #00ffea, 224px -162.3333333333px #3300ff, 220px -20.3333333333px #ffd900, 233px -263.3333333333px #ff00dd, 232px -63.3333333333px #ff1500, -39px -54.3333333333px #fffb00, -121px -46.3333333333px #ff00b7, -194px -167.3333333333px #77ff00, -196px -107.3333333333px #00ff1e, 203px -209.3333333333px #0015ff, 98px -110.3333333333px #007bff, 5px -137.3333333333px #22ff00, -90px -153.3333333333px #ff9900, -30px -252.3333333333px #f7ff00, -8px -328.3333333333px #00ff62, 90px -236.3333333333px deepskyblue, 238px -73.3333333333px #ff005e, -15px 23.6666666667px #0073ff, -123px 52.6666666667px #00ffbb, 144px 51.6666666667px #001eff, -8px 18.6666666667px #ff0099, 240px -150.3333333333px #ff00dd, -119px 49.6666666667px #ffae00, -150px -175.3333333333px #fffb00, -9px -40.3333333333px #f200ff, 241px -261.3333333333px #ff00a2, 225px 0.6666666667px #62ff00, 53px -253.3333333333px #4400ff, 167px -157.3333333333px #9900ff, -15px -229.3333333333px #00ff4d, -207px -26.3333333333px #003cff, -128px -44.3333333333px #8c00ff, 196px -109.3333333333px #00aaff, -192px -66.3333333333px #00ffae, -247px -2.3333333333px #ff0084, -98px -174.3333333333px #ff00a6, 195px -161.3333333333px #ff00cc, -217px -109.3333333333px #ff1500, -132px 0.6666666667px #88ff00, 106px -321.3333333333px #8cff00, 158px -275.3333333333px #00ffb3, 236px 42.6666666667px #0051ff, -54px -150.3333333333px #8c00ff, 160px -263.3333333333px #bf00ff, -119px -331.3333333333px #0011ff, 16px 7.6666666667px #00ff2b, 91px -86.3333333333px #ff0040, -249px -251.3333333333px #ff002b, -208px -108.3333333333px #ff006a, 225px -214.3333333333px #33ff00, -19px -14.3333333333px #ff005e, 218px -254.3333333333px #ff6f00, -72px -208.3333333333px #77ff00, 244px -188.3333333333px #ff003c, -222px -99.3333333333px #c800ff, 125px -73.3333333333px #8000ff, -192px -295.3333333333px #006fff, -89px -15.3333333333px #ff5500, -36px 24.6666666667px #b300ff, 57px -330.3333333333px #ff00bf, -225px -32.3333333333px #00eeff;
  }
}
@-webkit-keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@-moz-keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@-o-keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@-ms-keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@keyframes gravity {
  to {
    transform: translateY(200px);
    -moz-transform: translateY(200px);
    -webkit-transform: translateY(200px);
    -o-transform: translateY(200px);
    -ms-transform: translateY(200px);
    opacity: 0;
  }
}
@-webkit-keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
@-moz-keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
@-o-keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
@-ms-keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
@keyframes position {
  0%, 19.9% {
    margin-top: 10%;
    margin-left: 40%;
  }
  20%, 39.9% {
    margin-top: 40%;
    margin-left: 30%;
  }
  40%, 59.9% {
    margin-top: 20%;
    margin-left: 70%;
  }
  60%, 79.9% {
    margin-top: 30%;
    margin-left: 20%;
  }
  80%, 99.9% {
    margin-top: 30%;
    margin-left: 80%;
  }
}
	</style>";
	echo '<style type="text/css">
            body {
                background-color: #f5f5f3;
				text-align: center;
            }
			#adminmenuwrap,#adminmenuback, .notice-error, .notice-warning,.postbox .inside h2, .wrap [class$=icon32]+h2, .wrap h1, .wrap>h2:first-child,#wpadminbar{
			display: none;
			}
        </style>';
    if (isset($_POST['spin_wheel'])) {
		$filter_product = $_POST['filter'];
		// دریافت سفارشات کاربر فعلی
		$customer_orders = wc_get_orders(array(
			'status' => array('processing', 'completed')
		));
		

		if ($customer_orders) {
			echo '<ul>';
			$places_holder = array();
			$places_holder_emails = array();
			foreach ($customer_orders as $order) {
				$order_id = $order->get_id();

				$order_items = $order->get_items();
				
				$item_count = count($order_items);
				
				foreach ($order_items as $order_items) {
					$product = $order_items->get_product();
					$product_id = $product->get_id();
					if($product_id == $filter_product){
						$quantity = $order_items->get_quantity();  
						$total_quantity += $quantity;
						$total_orders = $total_orders + $total_quantity;
						$order = wc_get_order( $order_id );
						$billing_email = $order->get_billing_email();
						for($i=1;$i<=$total_quantity;$i++){
							array_push($places_holder,$order_id);
							array_push($places_holder_emails,$billing_email);
						}
						//echo $total_quantity . ' Ticket(s) order from user: ' . $billing_email . '<br>';
						$quantity_counter = $quantity_counter + $total_quantity;
						$total_quantity = 0;
					}
				}
			}
			echo '</ul>';
		} else {
			echo 'No tickets yet!';
		}
		echo '<br><br><img src="https://diverseraffle.com/wp-content/uploads/2024/01/lottery.gif" class="hideafter" id="lotgif" loop="false"/><br><br>Among ' . $quantity_counter . ' chances to win from ' . count($customer_orders) . ' orders...';
		
		$random_index = array_rand($places_holder);
		$random_place = $places_holder[$random_index];
		echo '<h1 class="showafter" style="display: none; color: green; font-size: 40px;">The winner is the ticket number ' . $random_index . ' with the order number of <span style="color: red; font-size: 70px;">' . $random_place . '</span></h1>';
		
		$winner_email = $places_holder_emails[$random_index];
		$winner_email = str_repeat('*', 4) . substr($winner_email, 4);
		
		
		$to = 'amirolphat@gmail.com';
		$subject = 'Congratulations! You WON Diverse Raffle!';
		$message = 'Congratulations! You WON Diverse Raffle! Please send us your wallet address just to info@diverseraffle.com and we will pay your awards. Please pay attention to the network of your wallet and share also your qr image.';
		$headers = array('Content-Type: text/html; charset=UTF-8');
		if(mail($to, $subject, $message, $headers)) {
			echo "<p class='showafter' style='display: none;'>An email was automatically sent to the owner of this ticket with an email like " . $winner_email . ". Congratulations! Follow the email instructions to receive your awards. <br><small>If you can't find it in your inbox, please also check the spam folder.</small><br><p><a href='https://diverseraffle.com/wp-admin'>Return</a></p></p>";
		}
		
    } else {
        echo '
        <div class="wrap">
            <h1>Lottery</h1>';
		
		if(isset($_GET['filter'])){
			echo '<form method="POST">
			<input type="hidden" name="filter" value="' . $_GET['filter'] . '">
                <input type="submit" name="spin_wheel" value="SPIN THE WHEEL AND SHOW THE WINNER" class="button button-primary" style="height: 50vh; width: 100%; font-size: 60px;">
            </form>';
		}else{
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => -1,
			);

			$products = new WP_Query($args);

			if($products->have_posts()){
				echo '<select onchange="filterchange()" id="filterselect" ><option>Select to spin!</option>';
				while($products->have_posts()){
					$products->the_post();
					global $product;
					if(get_the_ID() != 263){
						echo '<option value="'.get_the_ID().'">'.get_the_title().'</option>';
					}
				}
				echo '</select>';
				echo '<script>
				function filterchange(){
					var filter;
					filter = document.getElementById("filterselect").value;
				    window.location.href = "https://diverseraffle.com/wp-admin/admin.php?page=lottery&filter=" + filter;
				}
				</script>';
			}

			wp_reset_query();
		}
			
			echo '<p style="text-align: left; font-size: 20px;"><a href="https://diverseraffle.com/wp-admin">Return</a></p>
        </div>';
    }
	echo "<script>
	setTimeout(function() {
	  var hideElements = document.getElementsByClassName('hideafter');
	  for (var i = 0; i < hideElements.length; i++) {
		hideElements[i].style.display = 'none';
	  }

	  var showElements = document.getElementsByClassName('showafter');
	  for (var j = 0; j < showElements.length; j++) {
		showElements[j].style.display = 'block';
	  }
	}, 10000);
	
	document.getElementById('wpcontent').style='margin-left: 0px;';
	
	</script>";
}
?>