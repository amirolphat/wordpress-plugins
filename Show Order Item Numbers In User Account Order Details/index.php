<?php
/**
 * Plugin Name: Hawasil: Order items id viewer 
 * Plugin URI: https://host.hawasil.com/
 * Description: Show order items id number in user account order details
 * Author: Amir Olphat
 * Author URI: https://amirolphat.ir/
 * Version: 1.0
 */
function custom_order_item_display( $item_name, $item, $is_visible ) {
    if ( $is_visible ) {
        echo '<strong>Ticket Number #' . $item->get_id() . '</strong> - ' . $item_name;
    } else {
        echo $item_name;
    }
}
add_action( 'woocommerce_order_item_name', 'custom_order_item_display', 10, 3 );

?>