<?php
include_once(plugin_dir_path(__FILE__) . '/heading.php'); 
global $wpdb;

$results = $wpdb->get_results("SELECT dppcsettings_id, dppcsettings_value FROM {$wpdb->prefix}dppc_settings", ARRAY_N);
$settings = array('settings loader');
foreach ($results as $result) {
    array_push($settings, $result[1]);
}

if(isset($_POST['settings_additional_cost'])){
    
    $settings_additional_cost = sanitize_text_field($_POST['settings_additional_cost']);
    $settings_btn_phone = sanitize_text_field($_POST['settings_btn_phone']);
    $settings_calc_bg = sanitize_text_field($_POST['settings_calc_bg']);
    $settings_calc_color = sanitize_text_field($_POST['settings_calc_color']);
    $settings_btn_bg = sanitize_text_field($_POST['settings_btn_bg']);
    $settings_btn_color = sanitize_text_field($_POST['settings_btn_color']);
    $settings_btn_bg_hover = sanitize_text_field($_POST['settings_btn_bg_hover']);
    $settings_btn_color_hover = sanitize_text_field($_POST['settings_btn_color_hover']);
    
    $new_settings = array(
        1 => $settings_additional_cost,
        2 => $settings_btn_phone,
        3 => $settings_calc_bg,
        4 => $settings_calc_color,
        5 => $settings_btn_bg,
        6 => $settings_btn_color,
        7 => $settings_btn_bg_hover,
        8 => $settings_btn_color_hover
    );
    
    foreach ($new_settings as $key => $value) {
        $wpdb->update(
            $wpdb->prefix . 'dppc_settings',
            array('dppcsettings_value' => $value),
            array('dppcsettings_id' => $key)
        );
    }
    
    ?>
    <script>
        location.reload();
    </script>
    <?php
}

?>



<div id="col-container" class="wp-clearfix">

<div id="col-left">
    <div class="col-wrap">
        <div class="form-wrap">
        <form method="post" action="" class="validate">
            
        <div class="form-field form-required term-name-wrap">
        	<label for="settings_additional_cost">برچسب هزینه مازاد</label>
        	<input name="settings_additional_cost" id="settings_additional_cost" type="text" value="<?php echo $settings[1]; ?>" size="40" aria-required="true" aria-describedby="settings_additional_cost">
        </div>
        <div class="form-field form-required term-name-wrap">
        	<label for="settings_btn_phone">شماره تماس مشاوره</label>
        	<input name="settings_btn_phone" id="settings_btn_phone" type="number" value="<?php echo $settings[2]; ?>" size="40" aria-required="true" aria-describedby="settings_btn_phone">
        </div>
        <div class="form-field form-required term-name-wrap">
        	<label for="settings_calc_bg">رنگ پس زمینه باکس محاسبه</label>
        	<input name="settings_calc_bg" id="settings_calc_bg" type="color" value="<?php echo $settings[3]; ?>" size="40" aria-required="true" aria-describedby="settings_calc_bg">
        </div>
        <div class="form-field form-required term-name-wrap">
        	<label for="settings_calc_color">رنگ نوشته های باکس محاسبه</label>
        	<input name="settings_calc_color" id="settings_calc_color" type="color" value="<?php echo $settings[4]; ?>" size="40" aria-required="true" aria-describedby="settings_calc_color">
        </div>
        <div class="form-field form-required term-name-wrap">
        	<label for="settings_btn_bg">رنگ پس زمینه دکمه مشاوره</label>
        	<input name="settings_btn_bg" id="settings_btn_bg" type="color" value="<?php echo $settings[5]; ?>" size="40" aria-required="true" aria-describedby="settings_btn_bg">
        </div>
        <div class="form-field form-required term-name-wrap">
        	<label for="settings_btn_color">رنگ نوشته دکمه مشاوره</label>
        	<input name="settings_btn_color" id="settings_btn_color" type="color" value="<?php echo $settings[6]; ?>" size="40" aria-required="true" aria-describedby="settings_btn_color">
        </div>
        <div class="form-field form-required term-name-wrap">
        	<label for="settings_btn_bg_hover">رنگ پس زمینه دکمه مشاوره - شناور</label>
        	<input name="settings_btn_bg_hover" id="settings_btn_bg_hover" type="color" value="<?php echo $settings[7]; ?>" size="40" aria-required="true" aria-describedby="settings_btn_bg_hover">
        </div>
        <div class="form-field form-required term-name-wrap">
        	<label for="settings_btn_color_hover">رنگ نوشته دکمه مشاوره - شناور</label>
        	<input name="settings_btn_color_hover" id="settings_btn_color_hover" type="color" value="<?php echo $settings[8]; ?>" size="40" aria-required="true" aria-describedby="settings_btn_color_hover">
        </div>
        
        	<p class="submit">
        		<input type="submit" name="submit" id="submit" class="button button-primary" value="بروزرسانی">		<span class="spinner"></span>
        	</p>
        	</form>
        </div>
    </div>
</div>