<?php
global $wpdb;

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $wpdb->delete($wpdb->prefix . 'certificate', array('certificate_id' => $del_id));
}


if(isset($_POST['student_name'])){
    $student_name = sanitize_text_field($_POST['student_name']);
    $student_family = sanitize_text_field($_POST['student_family']);
    $student_melicode = sanitize_text_field($_POST['student_melicode']);
    $student_fromdate = sanitize_text_field($_POST['student_fromdate']);
    $student_todate = sanitize_text_field($_POST['student_todate']);
    $student_duration = sanitize_text_field($_POST['student_duration']);
    $sign1 = sanitize_text_field($_POST['student_sign1']);
    $sign2 = sanitize_text_field($_POST['student_sign2']);
    $sign3 = sanitize_text_field($_POST['student_sign3']);
    $vision = sanitize_text_field($_POST['student_vision']);
    $rate = '0';
    
    $data = array(
            'certificate_name' => $student_name,
            'certificate_family' => $student_family,
            'certificate_melicode' => $student_melicode,
            'certificate_fromdate' => $student_fromdate,
            'certificate_todate' => $student_todate,
            'certificate_duration' => $student_duration,
            'certificate_sign1' => $sign1,
            'certificate_sign2' => $sign2,
            'certificate_sign3' => $sign3,
            'certificate_vision' => $vision,
            'certificate_rate' => $rate
        );

    $wpdb->insert($wpdb->prefix . 'certificate', $data);
}
?>