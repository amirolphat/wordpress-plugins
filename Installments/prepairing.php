<?php
/**
 * Plugin Name: Installments
 * Plugin URI: https://github.com/amirolphat/wordpress-plugins
 * Description: This plugin manages Installments online calculation.
 * Author: Amir Olphat
 * Author URI: https://amirolphat.ir
 * Version: 1.0
 * Text Domain: hawasil-installments
 */


function installments_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'installments';
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE $table_name (
            ins_id int(11) NOT NULL AUTO_INCREMENT,
			userid text NULL,
			ins_title text NULL,
			ins_name text NULL,
			ins_family text NULL,
			ins_father text NULL,
			ins_melicode text NULL,
			ins_mobile text NULL,
			ins_phone text NULL,
			ins_birthdate text NULL,
			ins_birthplace text NULL,
			ins_city text NULL,
			ins_postal_code text NULL,
			ins_address text NULL,
			products_order_table text NULL,
			aghsat_date_is text NULL,
			ins_selling_type text NULL,
			ins_selling_pattern text NULL,
			ins_price_for_table text NULL,
			ins_selling_table text NULL,
			ins_pure_price_for_table text NULL,
			total_price_on_aghsat_table text NULL,
			table_aghsat_holder_input text NULL,
			melicart text NULL,
			shenasname text NULL,
			buyfactor text NULL,
			tashilat text NULL,
			agreement text NULL,
			agreement_attachment text NULL,
			payment_bill text NULL,
			zemanat_bill text NULL,
			kala_delivery text NULL,
			PRIMARY KEY (ins_id)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
register_activation_hook(__FILE__, 'installments_create_table'); 



 
function installments_shortcode() {
    ob_start();
    include( plugin_dir_path( __FILE__ ) . 'viewer.php' );
    return ob_get_clean();
}
add_shortcode( 'installments_viewer', 'installments_shortcode' );
 
 






function my_account_menu_items( $items ) {
    $items['partners'] = __( 'بخش همکاران', 'partners' );
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'my_account_menu_items', 10, 1 );

function partners_installments_shortcode() {
    ob_start();
    include( plugin_dir_path( __FILE__ ) . 'partners.php' );
    return ob_get_clean();
}
add_shortcode( 'partners_installments_viewer', 'partners_installments_shortcode' );




function installments_add_dashboard_page() {
    __(add_menu_page(
        'درخواست های ثبت شده برای وام و فروش اقساطی',
        'درخواست های وام',
        'edit_shop_orders',
        'installments',
        'installments_dashboard_page_content',
        'dashicons-printer',
        1
    ));
}
add_action('admin_menu', 'installments_add_dashboard_page');

function installments_dashboard_page_content() {
    echo __('<div class="wrap" id="wpcf7-contact-form-list-table">
        <h1 class="wp-heading-inline">درخواست های ثبت شده</h1> <br><br>');
        global $wpdb;
        $results = $wpdb->get_results("SELECT ins_id, ins_name, ins_family, ins_melicode, aghsat_date_is FROM {$wpdb->prefix}installments", ARRAY_A);
        foreach ($results as $result) {
            echo "<a style='text-decoration: none;' href='https://artavam.com/my-account/partners?view=" . $result['ins_id'] . "' target='_blank'>{$result['ins_name']} {$result['ins_family']} با کد ملی {$result['ins_melicode']} در تاریخ {$result['aghsat_date_is']}</a><br>";
        }
    echo __('</div>');
}




function add_collaborator_role() {
    add_role( 'collaborator', 'همکار', array(
        'read' => false,
        'edit_posts' => false,
        'delete_posts' => false,
        'upload_files' => false,
    ));
}
add_action( 'init', 'add_collaborator_role' );


 ?>