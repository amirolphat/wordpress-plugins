<?php
global $wpdb;
include_once(plugin_dir_path(__FILE__) . '/heading.php');


?>

<link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ ); ?>assets/css/viewer.css">
<link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ ); ?>assets/css/main.css">
<script src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/js/qrcode.min.js"></script>
<style>
	.footernotes, .bodynote{
		margin-top: 100px;
	}
	.bodynote{
		font-size: 30px;
	}
	.container{
		background-image: url('https://asanpazhooh.com/wp-content/uploads/2024/05/AsanPazhooh-Menu-Logo-1.png');
		background-position: top center;
		background-size: 100%;
		background-repeat: no-repeat;
	}
	body{
		overflow: hidden;
	}
</style>

<?php
	if(isset($_GET['id'])){
	$request_id = $_GET['id'];
	
	global $wpdb;
	$table_name = $wpdb->prefix . 'certificate';
	$cer_query = "SELECT * FROM $table_name WHERE certificate_id='$request_id'";
	$cer_results = $wpdb->get_results($cer_query);
	if ($cer_results == null){
		echo 'شناسه گواهینامه وارد شده صحیح نمی باشد.';
	}else{
	foreach ($cer_results as $cer_row) {
?>
		<div class="container">
		    <img src="https://files.123freevectors.com/wp-content/original/141642-blue-and-orange-geometric-shapes-background-vector.jpg" style="width: 100%; object-fit: cover; height: 50px;"/>
		    <div class="row">
		    	<div class="col-lg-2"><img src="https://asanpazhooh.com/wp-content/uploads/2024/01/AsanPazhooh-Menu-Logo.png"/></div>
		    	<div class="col-lg-2"><img src="https://asanpazhooh.com/wp-content/uploads/2024/01/Fani-Herfeii.png"/></div>
		    	<div class="col-lg-8"></div>
		    </div>
		    <div class="row">
		        <div class="col-lg-12" style="text-align: center;">
		            <h1>گواهی کارگاه </h1>
		            <p class="bodynote">بدینوسیله گواهی می شود <?php echo $cer_row->certificate_name . ' ' . $cer_row->certificate_family; ?> به کد ملی <?php echo $cer_row->certificate_melicode; ?> در <?php echo $cer_row->certificate_vision; ?> که از تاریخ <?php echo $cer_row->certificate_fromdate; ?> الی <?php echo $cer_row->certificate_todate; ?> به مدت <?php echo $cer_row->certificate_duration; ?> توسط موسسه علی پژوهشی آسان پژوه برگزار گردید، شرکت نموده اند.</p>
		            <div class="row">
		            	<div class="col-lg-4">مدیر علمی و اجرایی<br><?php echo $cer_row->certificate_sign1; ?></div>
		            	<div class="col-lg-4">مدرس علمی<br><?php echo $cer_row->certificate_sign2; ?></div>
		            	<div class="col-lg-4">مدرس علمی<br><?php echo $cer_row->certificate_sign3; ?></div>
		            </div>
		            <div class="row footernotes">
		            	<div class="col-lg-8">
		            	    <div>
				            <p class="addressnote">کرج، گوهردشت، بلوار موذن، بعد از بلوار دانشگاه، پلاک 750، واحد 1</p>
				            <div class="row">
				            	<div class="col-lg-6">تلفن: 026-34208393<br>کد پستی: 3148997718</div>
				            	<div class="col-lg-6">asanpazhooh@gmail.com<br>www.asanpazhooh.com</div>
				            </div>
			            </div>
		            	</div>
		            	<div class="col-lg-4" style="text-align: right;">
		            		<?php echo 'شناسه اعتبارسنجی: ' . $request_id; ?><br><br>
		            		<div id="qrcode"></div>
		            		<br>
		            		<script>
						var currentURL = window.location.href;
						var qrcode = new QRCode(document.getElementById("qrcode"), {
						  text: currentURL,
						  width: 100,
						  height: 100
						});
					</script>
		            	</div>
		            </div>
		        </div>
		    </div>
		</div>
<?php
	}
	}
	}else{
?>
		<div class="container">
		    <div class="row" style="margin-top: 100px;">
		        <div class="col-lg-12" style="text-align: center;">
		        	<form action="" method="get">
		        		<input name="id" type="number" placeholder="شناسه اعتبارسنجی گواهی">
		        		<br><br>
		        		<input type="submit" class="btn" style="width: 100%; border-radius: 50px;" value="استعلام">
		        	</form>
		        </div>
		    </div>
		</div>
<?php
	}
?>