
<?php
/**
 * Plugin Name: محاسبه گر قیمت کابینت
 * Plugin URI: https://github.com/amirolphat/wordpress-plugins
 * Description: این متغیر جنس و متریال را از شما دریافت می نماید و با توجه به فیلدهای ابعادی، هزینه کابینت را به صورت پویا توسط یک فرم هوشمند محاسبه می کند.
 * Author: امیر الفت
 * Author URI: https://amirolphat.ir
 * Version: 1.0
 * Text Domain: dppc
 */


function dppc_create_table() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'dppc';
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE $table_name (
            dppc_id int(11) NOT NULL AUTO_INCREMENT,
			dppc_value text NOT NULL,
			dppc_parent int(11) DEFAULT NULL,
			dppc_price text DEFAULT NULL,
			dppc_additional_price text DEFAULT NULL,
            PRIMARY KEY (dppc_id)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    
    $table_name = $wpdb->prefix . 'dppc_scale';
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE $table_name (
            dppcs_id int(11) NOT NULL AUTO_INCREMENT,
			dppcs_value text NOT NULL,
			dppcs_x int(11) DEFAULT NULL,
			dppcs_y int(11) DEFAULT NULL,
			dppcs_priority int(11) DEFAULT NULL,
            PRIMARY KEY (dppcs_id)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    
    $table_name = $wpdb->prefix . 'dppc_select';
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE $table_name (
            dppcs_id int(11) NOT NULL AUTO_INCREMENT,
			dppcs_value text NOT NULL,
			dppcs_parent int(11) DEFAULT NULL,
			dppcs_type int(11) DEFAULT NULL,
			dppcs_price int(11) DEFAULT NULL,
			dppcs_priority int(11) DEFAULT NULL,
			dppcs_icon text DEFAULT NULL,
            PRIMARY KEY (dppcs_id)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    
    $table_name = $wpdb->prefix . 'dppc_form';
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE $table_name (
            dppcf_id int(11) NOT NULL AUTO_INCREMENT,
			dppcf_name text NOT NULL,
			dppcf_phone text NOT NULL,
			dppcf_address text NOT NULL,
			dppcf_product text NOT NULL,
			dppcf_scale text NOT NULL,
			dppcf_price text NOT NULL,
            PRIMARY KEY (dppcf_id)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    
    $table_name = $wpdb->prefix . 'dppc_settings';
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE $table_name (
            dppcsettings_id int(11) NOT NULL AUTO_INCREMENT,
			dppcsettings_value text NOT NULL,
			PRIMARY KEY (dppcsettings_id)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    $values = array(
            'کارمزد نصب',
            '02122233344',
            '#4f375e',
            '#ffffff',
            '#ffffff',
            '#69a32c',
            '#69a32c',
            '#ffffff'
        );
        
        foreach($values as $value){
            $data = array(
                'dppcsettings_value' => $value
            );
        
            $wpdb->insert($table_name, $data);
        }
}
register_activation_hook(__FILE__, 'dppc_create_table'); 



function dppc_load_textdomain() {
    load_plugin_textdomain( 'dppc', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'dppc_load_textdomain' );



function dppc_add_dashboard_page() {
    __(add_menu_page(
        'محاسبه گر هوشمند قیمت کابینت',
        'اجناس و متریال',
        'manage_options',
        'dppc',
        'dppc_dashboard_page_content',
        'dashicons-calculator',
        1
    ));
}
add_action('admin_menu', 'dppc_add_dashboard_page');


function dppc_dashboard_page_content() {
    echo __('<div class="wrap" id="wpcf7-contact-form-list-table">
        <h1 class="wp-heading-inline">اجناس و متریال</h1> <br><br>');
    include_once(plugin_dir_path(__FILE__) . '/material/product_and_att.php');
    echo __('</div>');
}


function dppc_add_submenu_scale_page() {
    add_submenu_page( 'dppc', 'ابعاد و اندازه ها', 'ابعاد و اندازه ها', 'manage_options', 'dppc_scales', 'dppc_scales_submenu_page_cotent' ); 
}
add_action('admin_menu', 'dppc_add_submenu_scale_page');

function dppc_scales_submenu_page_cotent() {
    echo __('<div class="wrap" id="wpcf7-contact-form-list-table">
        <h1 class="wp-heading-inline">ابعاد و اندازه ها</h1> <br><br>');
    include_once(plugin_dir_path(__FILE__) . '/scale/product_and_att.php');
    echo __('</div>');
}

function dppc_add_submenu_selectz_page() {
    add_submenu_page( 'dppc', 'انتخابی ها', 'انتخابی ها', 'manage_options', 'dppc_selectz', 'dppc_selectz_submenu_page_cotent' ); 
}
add_action('admin_menu', 'dppc_add_submenu_selectz_page');

function dppc_selectz_submenu_page_cotent() {
    echo __('<div class="wrap" id="wpcf7-contact-form-list-table">
        <h1 class="wp-heading-inline">انتخابی ها</h1> <br><br>');
    include_once(plugin_dir_path(__FILE__) . '/select/product_and_att.php');
    echo __('</div>');
}

function dppc_add_submenu_settings_page() {
    add_submenu_page( 'dppc', 'تنظیمات', 'تنظیمات', 'manage_options', 'dppc_settings', 'dppc_settings_submenu_page_cotent' ); 
}
add_action('admin_menu', 'dppc_add_submenu_settings_page');

function dppc_settings_submenu_page_cotent() {
    echo __('<div class="wrap" id="wpcf7-contact-form-list-table">
        <h1 class="wp-heading-inline">تنظیمات</h1> <br><br>');
    include_once(plugin_dir_path(__FILE__) . '/settings.php');
    echo __('</div>');
}

function dppc_add_submenu_forms_page() {
    add_submenu_page( 'dppc', 'فرم ها', 'فرم ها', 'manage_options', 'dppc_forms', 'dppc_forms_submenu_page_cotent' ); 
}
add_action('admin_menu', 'dppc_add_submenu_forms_page');

function dppc_forms_submenu_page_cotent() {
    echo __('<div class="wrap" id="wpcf7-contact-form-list-table">
        <h1 class="wp-heading-inline">فرم ها</h1> <br><br>');
    include_once(plugin_dir_path(__FILE__) . '/forms.php');
    echo __('</div>');
}

function dppc_add_submenu_feedback_page() {
    add_submenu_page( 'dppc', 'بازخورد', 'بازخورد', 'manage_options', 'dppc_feedback', 'dppc_feedback_submenu_page_cotent' ); 
}
add_action('admin_menu', 'dppc_add_submenu_feedback_page');

function dppc_feedback_submenu_page_cotent() {
    echo __('<div class="wrap" id="wpcf7-contact-form-list-table">
        <h1 class="wp-heading-inline">بازخورد</h1> <br><br>');
    include_once(plugin_dir_path(__FILE__) . '/feedback.php');
    echo __('</div>');
}

function dppc_shortcode() {
    ob_start();
    include( plugin_dir_path( __FILE__ ) . 'viewer.php' );
    return ob_get_clean();
}
add_shortcode( 'dppc_viewer', 'dppc_shortcode' );


?>