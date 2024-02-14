<?php
global $wpdb;

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $wpdb->delete($wpdb->prefix . 'dppc', array('dppc_id' => $del_id));
}

function print_dppc_options() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'dppc';
    $results = $wpdb->get_results(
        "SELECT * FROM $table_name WHERE dppc_parent IS NULL OR dppc_parent = 0"
    );
    foreach ($results as $result) {
        echo '<option value="' . $result->dppc_id . '">' . $result->dppc_value . '</option>';
    }
}

if(isset($_POST['poa_title'])){
    $poa_title = sanitize_text_field($_POST['poa_title']);
    $poa_parent = sanitize_text_field($_POST['poa_parent']);
    if($poa_parent == 0){
        $poa_parent = null;
    }
    $poa_price = sanitize_text_field($_POST['poa_price']);
    $poa_additional_price = sanitize_text_field($_POST['poa_additional_price']);
    $data = array(
            'dppc_value' => $poa_title,
            'dppc_parent' => $poa_parent,
            'dppc_price' => $poa_price,
            'dppc_additional_price' => $poa_additional_price
        );

    $wpdb->insert($wpdb->prefix . 'dppc', $data);
}

?>