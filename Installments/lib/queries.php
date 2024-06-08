<?php

global $wpdb;

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $wpdb->delete($wpdb->prefix . 'installments', array('ins_id' => $del_id));
}


if(isset($_POST['ins_title'])){
    $userid = sanitize_text_field($_POST['userid']);
    $ins_title = sanitize_text_field($_POST['ins_title']);
    $ins_name = sanitize_text_field($_POST['ins_name']);
    $ins_family = sanitize_text_field($_POST['ins_family']);
    $ins_father = sanitize_text_field($_POST['ins_father']);
    $ins_melicode = sanitize_text_field($_POST['ins_melicode']);
    $ins_mobile = sanitize_text_field($_POST['ins_mobile']);
    $ins_phone = sanitize_text_field($_POST['ins_phone']);
    $ins_birthdate = sanitize_text_field($_POST['ins_birthdate']);
    $ins_birthplace = sanitize_text_field($_POST['ins_birthplace']);
    $ins_city = sanitize_text_field($_POST['ins_city']);
    $ins_postal_code = sanitize_text_field($_POST['ins_postal_code']);
    $ins_address = sanitize_text_field($_POST['ins_address']);
    $products_order_table = $_POST['products_order_table'];
    $aghsat_date_is = sanitize_text_field($_POST['aghsat_date_is']);
    $ins_selling_type = sanitize_text_field($_POST['ins_selling_type']);
    $ins_selling_pattern = sanitize_text_field($_POST['ins_selling_pattern']);
    $ins_price_for_table = sanitize_text_field($_POST['ins_price_for_table']);
    $ins_selling_table = sanitize_text_field($_POST['ins_selling_table']);
    $ins_pure_price_for_table = sanitize_text_field($_POST['ins_pure_price_for_table']);
    $total_price_on_aghsat_table = sanitize_text_field($_POST['total_price_on_aghsat_table']);
    $table_aghsat_holder_input = $_POST['table_aghsat_holder_input'];
    
    
    //uploadfiles from here
        $files_holder = array();

        $uploaded_files = array();

        $upload_dir = wp_upload_dir();
        
        $files = array('melicart', 'shenasname', 'buyfactor', 'tashilat', 'agreement', 'agreement_attachment', 'payment_bill', 'zemanat_bill', 'kala_delivery');

        foreach ($files as $file) {
            if (!empty($_FILES[$file]['name'])) {
                $file = $_FILES[$file];

                $file_name = $file['name'];
                $file_tmp = $file['tmp_name'];
                
                $file_uploaded = wp_handle_upload($file, array('test_form' => false));

                if ($file_uploaded && empty($file_uploaded['error'])) {
                    $uploaded_files[$file_name] = $file_uploaded['url'];
                    array_push($files_holder, $file_uploaded['url']);
                }
            }
        }
    //uploadfiles ends here
     
    $melicart = $files_holder[0];
    $shenasname = $files_holder[1];
    $buyfactor = $files_holder[2];
    $tashilat = $files_holder[3];
    $agreement = $files_holder[4];
    $agreement_attachment = $files_holder[5];
    $payment_bill = $files_holder[6];
    $zemanat_bill = $files_holder[7];
    $kala_delivery = $files_holder[8];
     
    // $melicart = sanitize_text_field($_POST['melicart']);
    // $shenasname = sanitize_text_field($_POST['shenasname']);
    // $buyfactor = sanitize_text_field($_POST['buyfactor']);
    // $tashilat = sanitize_text_field($_POST['tashilat']);
    // $agreement = sanitize_text_field($_POST['agreement']);
    // $agreement_attachment = sanitize_text_field($_POST['agreement_attachment']);
    // $payment_bill = sanitize_text_field($_POST['payment_bill']);
    // $zemanat_bill = sanitize_text_field($_POST['zemanat_bill']);
    // $kala_delivery = sanitize_text_field($_POST['kala_delivery']);
    
    $data = array(
            'userid' => $userid,
            'ins_title' => $ins_title,
            'ins_name' => $ins_name,
            'ins_family' => $ins_family,
            'ins_father' => $ins_father,
            'ins_melicode' => $ins_melicode,
            'ins_mobile' => $ins_mobile,
            'ins_phone' => $ins_phone,
            'ins_birthdate' => $ins_birthdate,
            'ins_birthplace' => $ins_birthplace,
            'ins_city' => $ins_city,
            'ins_postal_code' => $ins_postal_code,
            'ins_address' => $ins_address,
            'products_order_table' => $products_order_table,
            'aghsat_date_is' => $aghsat_date_is,
            'ins_selling_type' => $ins_selling_type,
            'ins_selling_pattern' => $ins_selling_pattern,
            'ins_price_for_table' => $ins_price_for_table,
            'ins_selling_table' => $ins_selling_table,
            'ins_pure_price_for_table' => $ins_pure_price_for_table,
            'total_price_on_aghsat_table' => $total_price_on_aghsat_table,
            'table_aghsat_holder_input' => $table_aghsat_holder_input,
            'melicart' => $melicart,
            'shenasname' => $shenasname,
            'buyfactor' => $buyfactor,
            'tashilat' => $tashilat,
            'agreement' => $agreement,
            'agreement_attachment' => $agreement_attachment,
            'payment_bill' => $payment_bill,
            'zemanat_bill' => $zemanat_bill,
            'kala_delivery' => $kala_delivery
        );

    $wpdb->insert($wpdb->prefix . 'installments', $data);
    
    echo '<script>window.location.href = window.location.href;</script>';
}
?>