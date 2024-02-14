<?php
global $wpdb;
include_once(plugin_dir_path(__FILE__) . '/heading.php');

$results = $wpdb->get_results("SELECT dppcsettings_id, dppcsettings_value FROM {$wpdb->prefix}dppc_settings", ARRAY_N);
$settings = array('settings loader');
foreach ($results as $result) {
    array_push($settings, $result[1]);
}

if(isset($_POST['fname'])){
    $fname = sanitize_text_field($_POST['fname']); $fphone = sanitize_text_field($_POST['fphone']);
    $faddress = sanitize_text_field($_POST['faddress']); $fproduct = sanitize_text_field($_POST['fproduct']);
    $fscale = sanitize_text_field($_POST['fscale']); $fprice = sanitize_text_field($_POST['fprice']);
    
    $data = array(
            'dppcf_name' => $fname,
            'dppcf_phone' => $fphone,
            'dppcf_address' => $faddress,
            'dppcf_product' => $fproduct,
            'dppcf_scale' => $fscale,
            'dppcf_price' => $fprice
        );
    
    $result = $wpdb->insert($wpdb->prefix . 'dppc_form', $data);
    
}

?>
<link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ ); ?>assets/css/viewer.css">
<link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ ); ?>assets/css/popup.css">

<style>
    .sidebar{
        background-color: <?php echo $settings[3]; ?>;
        color: <?php echo $settings[4]; ?>;
    }
    button, .button{
        color: <?php echo $settings[6]; ?>;
        background-color: <?php echo $settings[5]; ?>;
    }
    button:hover, .button:hover, button:active, .button:active {
        background-color: <?php echo $settings[7]; ?>;
        color: <?php echo $settings[8]; ?>;
    }
</style>

<div class="container">
    <div class="row" style="margin-top: 100px;">
        <div class="col-lg-4 sidebar">
            <table>
                <tr>
                    <td>قیمت یک متر کابینت</td>
                    <td id="cabinetpriceforonemeter">-</td>
                </tr>
                <tr>
                    <td>متراژ تقریبی</td>
                    <td id="aboutmeter">یک متر مربع</td>
                </tr>
                <tr>
                    <td>قیمت کابینت</td>
                    <td id="totalcostpermeter">-</td>
                </tr>
                <tr>
                    <td>اجرت نصب</td>
                    <td id="additionalpriceshow">-</td>
                </tr>
                <tr>
                    <td>جمع کل</td>
                    <td id="totalcost">-</td> 
                </tr>
                <tr>
                    <td><button onclick="refresh_request_prices(); location.href='#form'"><span class="material-symbols-outlined" style="font-size: 12px;">edit_note</span> ثبت درخواست</button></td>
                    <td><button onclick="location.href='tel:<?php echo $settings[2]; ?>'"><span class="material-symbols-outlined" style="font-size: 12px;">perm_phone_msg</span> مشاوره تلفنی</button></td>
                </tr>
            </table>
            <script>
                        function refresh_request_prices(){
                            var productselect = document.getElementById("product");
                            var productselectedOption = productselect.options[productselect.selectedIndex];
                            var label = productselectedOption.label;
                            document.getElementById("fproduct").value = label;
                            var matidis = "material-" + document.getElementById("product").value;
                            var materialselect = document.getElementById(matidis);
                            var selectedOption = materialselect.options[materialselect.selectedIndex];
                            var label = selectedOption.label;
                            document.getElementById("fproduct").value = document.getElementById("fproduct").value + " با متریال " + label;
                            document.getElementById("fscale").value = document.getElementById("aboutmeter").innerHTML;
                            document.getElementById("fprice").value = document.getElementById("totalcost").innerHTML;
                        }
                    </script>
            <div id="form" class="popup-container popup-style-6">
              <div class="popup-content">
                <a href="#" class="close">&times;</a>
                <h3><span class="material-symbols-outlined">edit_note</span> ثبت درخواست</h3><br>
                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                    <h5 class="title"><span class="material-symbols-outlined">badge</span> نام و نام خانوادگی</h5>
                    <input type="text" name="fname">
                    <h5 class="title"><span class="material-symbols-outlined">perm_phone_msg</span> شماره تماس</h5>
                    <input type="text" name="fphone" placeholder="مثل 09123334455">
                    <h5 class="title"><span class="material-symbols-outlined">person_pin_circle</span> آدرس پستی</h5>
                    <input type="text" name="faddress" placeholder="تهران، میدان تجریش، ...">
                    <small class="title">سایر مقادیر را ما با توجه به بخش نیازسنجی که وارد کرده اید وارد می کنیم <span class="material-symbols-outlined">sentiment_very_satisfied</span></small>
                    <input type="hidden" name="fproduct" id="fproduct">
                    <input type="hidden" name="fscale" id="fscale">
                    <input type="hidden" name="fprice" id="fprice">
                    <br><br><input type="submit" class="button" value="ثبت فرم">
                </form>
              </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <input type="hidden" name="matcheck_holder" id="matcheckholder"/>
                <input type="hidden" name="radio_holder" id="radioholder" value="0"/>
                <input type="hidden" name="scale_holder" id="scaleholder" value="0"/>
                <input type="hidden" name="additional_cost" id="additional_cost" value="60000"/>
                <h5 class="title"><span class="material-symbols-outlined">palette</span> جنس و متریال</h5>
                <div class="col-lg-6">
                    <?php
                      $table_name = $wpdb->prefix . 'dppc';
                      $parent_query = "SELECT * FROM $table_name WHERE dppc_parent IS NULL";
                      $parent_results = $wpdb->get_results($parent_query);
                      $counterfornext = 0;
                      foreach ($parent_results as $parent_row) {
                        $child_query = "SELECT * FROM $table_name WHERE dppc_parent = $parent_row->dppc_id";
                        $child_results = $wpdb->get_results($child_query);
                        if($counterfornext == 1){
                            echo '<select style="display: none;" class="hidetoreset" id="material-' . $parent_row->dppc_id . '" onchange="upc(this.options[this.selectedIndex].value)">';
                        }else{
                            echo '<select class="hidetoreset" id="material-' . $parent_row->dppc_id . '" onchange="upc(this.options[this.selectedIndex].value)">';
                        }
                        foreach ($child_results as $child_row) {
                            echo '<option id="' . $child_row->dppc_id . '" value="' . $child_row->dppc_price . '">' . $child_row->dppc_value . '</option>';
                        }
                        echo '</select>';
                        $counterfornext = 1;
                      }
                        
                        $child_query = "SELECT * FROM $table_name WHERE dppc_parent IS NOT NULL";
                        $child_results = $wpdb->get_results($child_query);
                        echo '<select id="add_cost" style="display: none;">';
                        foreach ($child_results as $child_row) {
                            if(empty($child_row->dppc_additional_price) || $child_row->dppc_additional_price == 0){
                                echo '<option value="0">' . $child_row->dppc_id . '</option>';
                            }
                              echo '<option value="' . $child_row->dppc_additional_price . '" id="add_cost-' . $child_row->dppc_id . '">' . $child_row->dppc_value . '</option>';
                            }
                        echo '</select>';
                    ?>
                      </select>
                </div>
                <div class="col-lg-6">
                    <?php
                      $parent_queryz = "SELECT * FROM $table_name WHERE dppc_parent IS NULL";
                      $parent_resultz = $wpdb->get_results($parent_queryz);
                      ?>
                      <select id="product" onchange="change_price_on_product_change(); show_related_material(this.value)">
                      <?php 
                      foreach ($parent_resultz as $parent_rowz) {
                          echo '<option value="' . $parent_rowz->dppc_id . '">' . $parent_rowz->dppc_value . '</option>';
                      }
                    ?>
                        </select>
                </div>
            </div>
            <br>
            <div class="row">
                <h5 class="title"><span class="material-symbols-outlined">ink_highlighter_move</span> ابعاد و اندازه</h5>
                <?php
                    $table_name = $wpdb->prefix . 'dppc_scale';
                    $query = "SELECT * FROM $table_name ORDER BY dppcs_priority ASC";
                    $results = $wpdb->get_results($query);
                    echo '<div class="row">';
                    foreach ($results as $row) {
                        if($row->dppcs_x == 0 or empty($row->dppcs_x)){
                            echo '<div class="col-lg-6">';
                            echo '<div class="row scalefields">
                            <div class="col-lg-4">
                                <input type="number" id="scalex-' . $row->dppcs_id . '" placeholder="0" onchange="scalechange(this.value,1,' . $row->dppcs_id . ')">
                            </div>
                            <div class="col-lg-8">
                                <label for="scalex' . $row->dppcs_id . '">عرض ' . $row->dppcs_value . '</label>
                            </div>
                            </div>';
                            echo '</div>';
                        }else{
                            echo '<input type="hidden" id="scalex-' . $row->dppcs_id . '" placeholder="0" value="' . $row->dppcs_x . '" onchange="scalechange(this.value,1,' . $row->dppcs_id . ')">';
                        }
                        if($row->dppcs_y == 0 or empty($row->dppcs_y)){
                            echo '<div class="col-lg-6">';
                            echo '<div class="row scalefields">
                            <div class="col-lg-4">
                                <input type="number" id="scaley-' . $row->dppcs_id . '" placeholder="0" onchange="scalechange(this.value,2,' . $row->dppcs_id . ')">
                            </div>
                            <div class="col-lg-8">
                                <label for="scaley-' . $row->dppcs_id . '">طول ' . $row->dppcs_value . '</label>
                            </div>
                            </div>';
                            echo '</div>';
                        }else{
                            echo '<input type="hidden" id="scaley-' . $row->dppcs_id . '" placeholder="0" value="' . $row->dppcs_y . '" onchange="scalechange(this.value,2,' . $row->dppcs_id . ')">';
                        }
                    }
                    echo '</div>';
                ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                      $table_name = $wpdb->prefix . 'dppc_select';
          
                      $parent_query = "SELECT * FROM $table_name WHERE dppcs_parent IS NULL OR dppcs_parent = 0 ORDER BY dppcs_priority ASC";
                      $parent_results = $wpdb->get_results($parent_query);
                      echo '<div class="row">';
                      foreach ($parent_results as $parent_row) {
                          echo '<div class="col-lg-6">';
                          echo '<h5 class="title"><span class="material-symbols-outlined">' . $parent_row->dppcs_icon . '</span> '. $parent_row->dppcs_value .'</h5>';
            	        if($parent_row->dppcs_type == 2){
            	          $selector_type = 'چند انتخابی';
            	          $child_query = "SELECT * FROM $table_name WHERE dppcs_parent = $parent_row->dppcs_id ORDER BY dppcs_priority ASC";
                          $child_results = $wpdb->get_results($child_query);
                          echo '<fieldset>';
                          foreach ($child_results as $child_row) {
                              echo '<input type="checkbox" id="check-' . $child_row->dppcs_id . '" value="' . $child_row->dppcs_price . '" onchange="addcheckbox(this.value, this.id)">';
                            echo '<label for="check-' . $child_row->dppcs_id . '">' . $child_row->dppcs_value . '</label>';
                          }
                          echo '</fieldset>';
            	        }else{
            	          $selector_type = 'تک انتخابی';
            	          $child_query = "SELECT * FROM $table_name WHERE dppcs_parent = $parent_row->dppcs_id ORDER BY dppcs_priority ASC";
                          $child_results = $wpdb->get_results($child_query);
                          echo '<fieldset>';
                          foreach ($child_results as $child_row) {
                            echo '<input name="radio-' . $parent_row->dppcs_id . '" type="radio" value="' . $child_row->dppcs_price . '" id="radio-' . $child_row->dppcs_id . '" onchange="addradio(this.value,this.id,this.name)">';
                            echo '<label for="radio-' . $child_row->dppcs_id . '">' . $child_row->dppcs_value . '</label>';
                          }
                          echo '</fieldset>';
            	        }
            	        echo '</div>';
                      }
                      echo '</div>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function show_related_material(productid){
        var elements = document.getElementsByClassName('hidetoreset');
        for(var i = 0; i < elements.length; i++) {
            elements[i].style.display = 'none';
        }
        var productmat = 'material-' + productid;
        document.getElementById(productmat).style="display: block;";
    }
</script>

<script src="<?php echo plugin_dir_url(__FILE__) . '/assets/js/pricecalculator.js'; ?>"></script>