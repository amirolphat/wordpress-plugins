<?php
global $wpdb;

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $wpdb->delete($wpdb->prefix . 'dppc_select', array('dppcs_id' => $del_id));
}

function print_dppc_options() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'dppc_select';
    $results = $wpdb->get_results(
        "SELECT * FROM $table_name WHERE dppcs_parent IS NULL OR dppcs_parent = 0"
    );
    foreach ($results as $result) {
        echo '<option value="' . $result->dppcs_id . '">' . $result->dppcs_value . '</option>';
    }
    if(count($results) == 0){
        echo '<option value="0">هنوز انتخابگری تعریف نکرده اید!</option>';
    }
}

if(isset($_POST['sename'])){
    $sename = sanitize_text_field($_POST['sename']);
    $setype = sanitize_text_field($_POST['setype']);
    $separent = sanitize_text_field($_POST['separent']);
    $secost = sanitize_text_field($_POST['secost']);
    $sepriority = sanitize_text_field($_POST['sepriority']);
    $seicon = sanitize_text_field($_POST['seicon']);
    $data = array(
            'dppcs_value' => $sename,
            'dppcs_parent' => $separent,
            'dppcs_type' => $setype,
            'dppcs_price' => $secost,
            'dppcs_priority' => $sepriority,
            'dppcs_icon' => $seicon
        );

    $wpdb->insert($wpdb->prefix . 'dppc_select', $data);
}

?>