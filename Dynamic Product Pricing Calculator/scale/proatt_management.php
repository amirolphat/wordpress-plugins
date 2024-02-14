<div id="col-right">
    <div class="col-wrap">
        <h2>لیست متغیرهای اندازه ای وارد شده</h2>
        <?php
          global $wpdb;
          
            $table_name = $wpdb->prefix . 'dppc_scale';
          
            $query = "SELECT * FROM $table_name ORDER BY dppcs_priority ASC";
            $results = $wpdb->get_results($query);
            
            echo '<table class="wp-list-table widefat fixed striped table-view-list">';
            echo '<tr><th>عملیات</th><th>برچسب</th><th>عرض</th><th>طول</th><th>اولویت</th></tr>';
          
            foreach ($results as $row) {
              
                echo '<tr style="background-color: #d5dfe8;">';
                echo '<td><a href="admin.php?page=dppc_scales&del=' . $row->dppcs_id . '"<i class="wp-menu-image dashicons-before dashicons-trash"></i></a></td>';
                echo '<td>' . $row->dppcs_value . '</td>';
                echo '<td>' . $row->dppcs_x . '</td>';
                echo '<td>' . $row->dppcs_y . '</td>';
                echo '<td>' . $row->dppcs_priority . '</td>';
                echo '</tr>';
            }
          echo '</table>';

        ?>
    </div>
</div>