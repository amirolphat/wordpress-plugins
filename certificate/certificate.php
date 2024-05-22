<?php
/**
 * Plugin Name: Online Certificate Generator
 * Plugin URI: https://github.com/amirolphat/wordpress-plugins
 * Description: This plugin can generate online certificate for your students.
 * Author: Amir Olphat
 * Author URI: https://amirolphat.ir
 * Version: 1.0
 * Text Domain: hawasil-certificate
 */

function certificate_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'certificate';
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE $table_name (
            certificate_id int(11) NOT NULL AUTO_INCREMENT,
			certificate_name text NOT NULL,
			certificate_family text NOT NULL,
			certificate_melicode text NOT NULL,
			certificate_fromdate text NOT NULL,
			certificate_todate text NOT NULL,
			certificate_duration text NOT NULL,
			certificate_sign1 text NOT NULL,
			certificate_sign2 text NOT NULL,
			certificate_sign3 text NOT NULL,
			certificate_vision text NOT NULL,
			certificate_rate text NOT NULL,
            PRIMARY KEY (certificate_id)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
register_activation_hook(__FILE__, 'certificate_create_table'); 





function certificate_load_textdomain() {
    load_plugin_textdomain( 'certificate', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'certificate_load_textdomain' );




function certificate_add_dashboard_page() {
    __(add_menu_page(
        'Certificate',
        'Certificate',
        'manage_options',
        'certificate',
        'certificate_dashboard_page_content',
        'dashicons-printer',
        1
    ));
}
add_action('admin_menu', 'certificate_add_dashboard_page');



function certificate_dashboard_page_content() {
    echo __('<div class="wrap" id="wpcf7-contact-form-list-table">
        <h1 class="wp-heading-inline">Certificate</h1> <br><br>');
        include_once(plugin_dir_path(__FILE__) . '/student.php');
    echo __('</div>');
}



function certificate_shortcode() {
    ob_start();
    include( plugin_dir_path( __FILE__ ) . 'viewer.php' );
    return ob_get_clean();
}
add_shortcode( 'certificate_viewer', 'certificate_shortcode' );

?>