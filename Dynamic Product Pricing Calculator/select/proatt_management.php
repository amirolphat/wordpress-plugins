<div id="col-right">
    <div class="col-wrap">
        <h2>لیست انتخابگرهای وارد شده</h2>
        <?php
          global $wpdb;
          
          $table_name = $wpdb->prefix . 'dppc_select';
          
          $parent_query = "SELECT * FROM $table_name WHERE dppcs_parent IS NULL OR dppcs_parent = 0 ORDER BY dppcs_priority ASC";
          $parent_results = $wpdb->get_results($parent_query);
          
          echo '<table class="wp-list-table widefat fixed striped table-view-list">';
          echo '<tr><th>عملیات</th><th>برچسب</th><th>نوع</th><th>قیمت</th><th>اولویت</th></tr>';
          foreach ($parent_results as $parent_row) {
	          if($parent_row->dppcs_type == 2){
	          	$selector_type = 'چند انتخابی';
	          }else{
	          	$selector_type = 'تک انتخابی';
	          }
            echo '<tr style="background-color: #d5dfe8;">';
            echo '<td><a href="admin.php?page=dppc_selectz&del=' . $parent_row->dppcs_id. '"<i class="wp-menu-image dashicons-before dashicons-trash"></i></a></td>';
                if(empty($parent_row->dppcs_icon) || $parent_row->dppcs_icon == ''){
                	echo '<td>' . $parent_row->dppcs_value . '</td>';
                }else{
                	echo '<td><span class="material-symbols-outlined" style="font-size: 12px;">' . $parent_row->dppcs_icon . ' </span>' . $parent_row->dppcs_value . '</td>';
                }
            echo '<td>' . $selector_type . '</td>';
            echo '<td></td>';
            echo '<td>' . $parent_row->dppcs_priority . '</td>';
            echo '</tr>';
            
            $child_query = "SELECT * FROM $table_name WHERE dppcs_parent = $parent_row->dppcs_id ORDER BY dppcs_priority ASC";
            $child_results = $wpdb->get_results($child_query);
            
            foreach ($child_results as $child_row) {
              echo '<tr>';
              echo '<td><a href="admin.php?page=dppc_selectz&del=' . $child_row->dppcs_id . '"<i class="wp-menu-image dashicons-before dashicons-trash"></i></a></td>';
              echo '<td>' . $child_row->dppcs_value . '</td>';
              echo '<td></td>';
              echo '<td>' . number_format($child_row->dppcs_price) . ' تومان</td>';
              echo '<td>' . $child_row->dppcs_priority . '</td>';
              echo '</tr>';
            }
          }
          
          echo '</table>';

        ?>
    </div>
</div>