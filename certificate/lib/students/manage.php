<div id="col-right">
    <div class="col-wrap">
        <h2>Current Submited Certificates</h2>
        <?php
          global $wpdb;
          
          $table_name = $wpdb->prefix . 'certificate';
          
          $cer_query = "SELECT * FROM $table_name";
          $cer_results = $wpdb->get_results($cer_query);
          
          echo '<table class="wp-list-table widefat fixed striped table-view-list">';
          echo '<tr><th>Tools</th><th>Name</th><th>Family</th><th>Vision</th></tr>';
          
          foreach ($cer_results as $cer_row) {
            echo '<tr style="background-color: #d5dfe8;">';
            echo '<td><a href="admin.php?page=certificate&del=' . $cer_row->certificate_id . '"<i class="wp-menu-image dashicons-before dashicons-trash"></i></a></td>';
            echo '<td>' . $cer_row->certificate_name . '</td>';
            echo '<td>' . $cer_row->certificate_family . '</td>';
            echo '<td>' . $cer_row->certificate_vision . '</td>';
            echo '</tr>';
          }
          
          echo '</table>';

        ?>
    </div>
</div>