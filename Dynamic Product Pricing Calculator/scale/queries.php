<?php
global $wpdb;

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $wpdb->delete($wpdb->prefix . 'dppc_scale', array('dppcs_id' => $del_id));
}

if(isset($_POST['sname'])){
    $sname = sanitize_text_field($_POST['sname']);
    $scalex = sanitize_text_field($_POST['scalex']);
    $scaley = sanitize_text_field($_POST['scaley']);
    if($scalex == 0){
        $scalex = null;
    }
    if($scaley == 0){
        $scaley = null;
    }
    $spriority = sanitize_text_field($_POST['spriority']);
    $data = array(
            'dppcs_value' => $sname,
            'dppcs_x' => $scalex,
            'dppcs_y' => $scaley,
            'dppcs_priority' => $spriority
        );

    $wpdb->insert($wpdb->prefix . 'dppc_scale', $data);
}

?>