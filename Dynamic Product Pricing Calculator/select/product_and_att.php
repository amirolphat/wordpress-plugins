<?php include_once(plugin_dir_path(__FILE__) . '/queries.php'); ?>
<?php include_once(plugin_dir_path(__FILE__) . '/../heading.php'); ?>


<div id="col-container" class="wp-clearfix">

<div id="col-left">
    <div class="col-wrap">
        <div class="form-wrap">
        <h2>انتخابی ها</h2>
        <form method="post" action="" class="validate">
	        <div class="form-field form-required term-name-wrap">
	        	<label for="sename">برچسب</label>
	        	<input name="sename" id="sename" type="text" value="" size="40" aria-required="true" aria-describedby="sename-description">
	        	<p id="sename-description">برچسب نمایشی مناسبی برای انتخابی جدید بنویسید.</p>
	        </div>
        	<div class="form-field term-parent-wrap">
        	    	<label for="setype">آیا این یک انتخابگر است؟</label>
	        	<select name="setype" id="setype" class="postform" style="width: 100%;" aria-describedby="setype-description" onchange="check_type_con()">
	        		<option value="1">خیر، این یک مقدار است</option>
	        	        <option value="2">بله، از نوع چند انتخابی</option>
	        	        <option value="3">بله، از نوع تک انتخابی</option>
	                </select>
        		<p id="setype-description">اگر این یک انتخاب است، برای کدام برچسب؟</p>
        	</div>
        	<div id="variable_con">
	        	<div class="form-field term-parent-wrap">
	        	    	<label for="separent">این مقدار به کدام برچسب نسبت داده شود؟</label>
	        		    <select name="separent" id="separent" class="postform" style="width: 100%;" aria-describedby="separent-description">
		        	        <?php print_dppc_options(); ?> 
		        	        <option value="0" style="display: none;" id="makeparentnull">هنوز انتخابگری تعریف نکرده اید!</option>
		                </select>
	        		
	        	</div>
	        	<div class="form-field form-required term-name-wrap">
	        		<label for="secost">قیمت</label>
			        <input name="secost" id="secost" type="number" value="" size="40" aria-required="true" aria-describedby="secost-description">
			        <p id="secost-description">اگر در قیمت تاثیرگذار است، هزینه مازاد انتخاب این گزینه را وارد کنید.</p>
	        	</div>
        	</div>
        	<div class="form-field form-required term-name-wrap" id="iconselector" style="display: none;">
    	       <label for="seicon">آیکون</label>
    	       <input name="seicon" id="seicon" type="text" value="" size="40" aria-required="true" aria-describedby="seicon-description" placeholder="مثل chevron_right">
    	       <p id="seicon-description">با وارد کردن تگ آیکون از لیست <a href="https://fonts.google.com/icons" target="_blank">گوگل</a> به انتخابگر خود آیکون اضافه کنید!</p>
	        </div>
        	<div class="form-field form-required term-name-wrap">
	        	<label for="sepriority">اولویت نمایش</label>
	        	<input name="sepriority" id="sepriority" type="number" value="" size="40" aria-required="true" aria-describedby="sepriority-description">
	        	<p id="sepriority-description">ترتیب نمایش در صفحه مهم است؟ این فیلد را یک عدد دلخواه بگذارید تا جایگاه آن در اولویت نمایش را مشخص کنید. در غیر این صورت می توانید آن را خالی رها کنید. اگر دو فیلد با یک عدد اولویت نمایش یکسان باشند، یکی از آن ها بالاتر از دیگری نمایش داده می شود.</p>
	        </div>
        	<p class="submit">
        		<input type="submit" name="submit" id="submit" class="button button-primary" value="ثبت">		<span class="spinner"></span>
        	</p>
        	</form>
        </div>
    </div>
</div>
<script>
    function check_type_con(){
        if(document.getElementById("setype").value != 1){
            document.getElementById("variable_con").style="display: none;";
            document.getElementById("makeparentnull").style="display: block;";
            document.getElementById("separent").value=0;
            document.getElementById("iconselector").style="display: block;";
        }else{
            document.getElementById("variable_con").style="display: block;";
            document.getElementById("makeparentnull").style="display: none;";
            document.getElementById('separent').selectedIndex = 0;
            document.getElementById("iconselector").style="display: none;";
        }
    }
</script>

<?php include_once(plugin_dir_path(__FILE__) . '/proatt_management.php'); ?>