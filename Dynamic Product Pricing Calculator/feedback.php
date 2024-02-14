<?php
include_once(plugin_dir_path(__FILE__) . '/heading.php'); 
global $wpdb;

if(isset($_POST['fb_name'])){
    
    $fb_name = sanitize_text_field($_POST['fb_name']);
    $fb_phone = sanitize_text_field($_POST['fb_phone']);
    $fb_email = sanitize_text_field($_POST['fb_email']);
    $fb_text = sanitize_text_field($_POST['fb_text']);
    $fbwebsite = sanitize_text_field($_POST['fbwebsite']);
    
    $to = 'amirolphat@gmail.com';
    $subject = 'بازخورد جدید برای پلاگین DPPC';
    
    $message = "نام: $fb_name
    ";
    $message .= "تلفن: $fb_phone
    ";
    $message .= "ایمیل: $fb_email
    ";
    $message .= "متن بازخورد: $fb_text
    ";
    $message .= "وب سایت: $fbwebsite
    ";
    
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: ' . get_bloginfo( 'name' ) . ' <' . get_option( 'admin_email' ) . '>';
    
    wp_mail( $to, $subject, $message, $headers );
    
    ?>
    <script>
        location.reload();
    </script>
    <?php
}

?>



<div id="col-container" class="wp-clearfix">
<p>درخواست توسعه یا گزارش خاصی دارید؟ آن را برای توسعه دهنده ازین قسمت ارسال کنید.</p>
<div id="col-left">
    <div class="col-wrap">
        <div class="form-wrap">
        <form method="post" action="" class="validate">
            
        <div class="form-field form-required term-name-wrap">
        	<label for="fb_name">نام و نام خانوادگی</label>
        	<input name="fb_name" id="fb_name" type="text" size="40" aria-required="true" aria-describedby="fb_name">
        </div>
        <div class="form-field form-required term-name-wrap">
        	<label for="fb_phone">شماره تماس</label>
        	<input name="fb_phone" id="fb_phone" type="number" size="40" aria-required="true" aria-describedby="fb_phone">
        </div>
        <div class="form-field form-required term-name-wrap">
        	<label for="fb_email">ایمیل</label>
        	<input name="fb_email" id="fb_email" type="text" size="40" aria-required="true" aria-describedby="fb_email">
        </div>
        <div class="form-field form-required term-name-wrap">
        	<label for="fb_text">بازخورد</label>
        	<textarea name="fb_text" id="fb_text" placeholder="بازخورد خود را اینجا بنویسید." aria-describedby="fb_text"></textarea>
        </div>
        <input name="fbwebsite" type="hidden" value="<?php echo $_SERVER[HTTP_HOST]; ?>">
        	<p class="submit">
        		<input type="submit" name="submit" id="submit" class="button button-primary" value="ارسال">		<span class="spinner"></span>
        	</p>
        	</form>
        </div>
        <a href="https://github.com/amirolphat/wordpress-plugins" target="_blank">صفحه پلاگین</a> | <a href="https://www.linkedin.com/in/amirolphat/" target="_blank"">توسعه دهنده در LinkedIn</a> | <a href="https://amirolphat.ir" target="_blank">وبسایت توسعه دهنده</a>
    </div>
</div>