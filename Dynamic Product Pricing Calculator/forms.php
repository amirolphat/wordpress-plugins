<?php include_once(plugin_dir_path(__FILE__) . '/heading.php');
if (isset($_GET['del'])) {
    global $wpdb;
    $del_id = $_GET['del'];
    $wpdb->delete($wpdb->prefix . 'dppc_form', array('dppcf_id' => $del_id));
}
?>


<div id="col-container" class="wp-clearfix">
    <div class="col-wrap">
        <h2>لیست فرم های درخواست های ثبت شده</h2>
        <?php
          global $wpdb;
          
            $table_name = $wpdb->prefix . 'dppc_form';
          
            $query = "SELECT * FROM $table_name";
            $results = $wpdb->get_results($query);
            
            echo '<table class="wp-list-table widefat fixed striped table-view-list">';
            echo '<tr><th>عملیات</th><th>نام و نام خانوادگی</th><th>شماره تماس</th><th>آدرس</th><th>محصول</th><th>حدود قیمت</th><th>حدود ابعاد</th></tr>';
          
            foreach ($results as $row) {
              
                echo '<tr style="background-color: #d5dfe8;">';
                echo '<td><a href="admin.php?page=dppc_forms&del=' . $row->dppcf_id . '"<i class="wp-menu-image dashicons-before dashicons-trash"></i></a></td>';
                echo '<td>' . $row->dppcf_name . '</td>';
                echo '<td>' . $row->dppcf_phone . '</td>';
                echo '<td>' . $row->dppcf_address . '</td>';
                echo '<td>' . $row->dppcf_product . '</td>';
                echo '<td>' . $row->dppcf_scale . '</td>';
                echo '<td>' . $row->dppcf_price . '</td>';
                echo '</tr>';
            }
          echo '</table>';

        ?>
    </div>