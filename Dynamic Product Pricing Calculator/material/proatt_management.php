<div id="col-right">
    <div class="col-wrap">
        <h2>لیست اجناس و متریال های وارد شده</h2>
        <?php
          global $wpdb;
          
          $table_name = $wpdb->prefix . 'dppc';
          
          $parent_query = "SELECT * FROM $table_name WHERE dppc_parent IS NULL";
          $parent_results = $wpdb->get_results($parent_query);
          
          echo '<table class="wp-list-table widefat fixed striped table-view-list">';
          echo '<tr><th>عملیات</th><th>جنس</th><th>متریال</th><th>قیمت هر متر</th><th>هزینه مازاد</th></tr>';
          
          foreach ($parent_results as $parent_row) {
            echo '<tr style="background-color: #d5dfe8;">';
            echo '<td><a href="admin.php?page=dppc&del=' . $parent_row->dppc_id . '"<i class="wp-menu-image dashicons-before dashicons-trash"></i></a></td>';
            echo '<td>' . $parent_row->dppc_value . '</td>';
            echo '<td>' . $parent_row->dppc_parent . '</td>';
            echo '<td>' . $parent_row->dppc_price . '</td>';
            echo '<td>' . $parent_row->dppc_additional_price . '</td>';
            echo '</tr>';
            
            $child_query = "SELECT * FROM $table_name WHERE dppc_parent = $parent_row->dppc_id";
            $child_results = $wpdb->get_results($child_query);
            
            foreach ($child_results as $child_row) {
              echo '<tr>';
              echo '<td><a href="admin.php?page=dppc&del=' . $child_row->dppc_id . '"<i class="wp-menu-image dashicons-before dashicons-trash"></i></a></td>';
              echo '<td></td>';
              echo '<td>' . $child_row->dppc_value . '</td>';
              echo '<td>' . number_format($child_row->dppc_price) . ' تومان</td>';
              if(!empty($child_row->dppc_additional_price) && $child_row->dppc_additional_price !== 0){
                  echo '<td>' . number_format($child_row->dppc_additional_price) . ' تومان</td>';
              }else{
                  echo '<td>ندارد</td>';
              }
              echo '</tr>';
            }
          }
          
          echo '</table>';

        ?>
    </div>
</div>