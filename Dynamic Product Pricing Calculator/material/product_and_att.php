<?php include_once(plugin_dir_path(__FILE__) . '/queries.php'); ?>
<?php include_once(plugin_dir_path(__FILE__) . '/../heading.php'); ?>


<div id="col-container" class="wp-clearfix">

<div id="col-left">
    <div class="col-wrap">
        <div class="form-wrap">
        <h2>افزودن جنس / متریال</h2>
        <form method="post" action="" class="validate">
        <div class="form-field form-required term-name-wrap">
        	<label for="tag-name">عنوان</label>
        	<input name="poa_title" id="tag-name" type="text" value="" size="40" aria-required="true" aria-describedby="name-description">
        	<p id="name-description">برچسب نمایشی مناسبی برای جنس یا متریال جدید بنویسید.</p>
        </div>
        	<div class="form-field term-parent-wrap">
        	    <label for="parent">آیا این یک متریال است؟</label>
        		<select name="poa_parent" id="parent" class="postform" style="width: 100%;" aria-describedby="parent-description" onchange="check_price_con()">
        	        <option value="0">خیر این یک جنس است</option>
        	        <?php print_dppc_options(); ?> 
                </select>
        				<p id="parent-description">اگر این یک متریال است، برای کدام جنس است؟</p>
        	</div>
        <div class="form-field form-required term-name-wrap" id="price_con" style="display: none;">
        	<label for="tag-cost">قیمت</label>
        	<input name="poa_price" id="tag-cost" type="number" value="" size="40" aria-required="true" aria-describedby="cost-description">
        	<p id="cost-description">برای یک متر (به تومان و با اعداد انگلیسی وارد کنید)</p>
        </div>
        <div class="form-field form-required term-name-wrap" id="additional_price_con" style="display: none;">
        	<label for="tag-additional-cost">قیمت</label>
        	<input name="poa_additional_price" id="tag-additional-cost" type="number" value="0" size="40" aria-required="true" aria-describedby="additional_cost-description">
        	<p id="additional_cost-description">اگر هزینه مازادی مثل نصب، گارانتی یا مورد دیگری دارید اینجا وارد کنید، در غیر این صورت مقدار را 0 قرار دهید.</p>
        </div>
        	<p class="submit">
        		<input type="submit" name="submit" id="submit" class="button button-primary" value="ثبت">		<span class="spinner"></span>
        	</p>
        	</form>
        </div>
    </div>
</div>
<script>
    function check_price_con(){
        if(document.getElementById("parent").value == 0){
            document.getElementById("price_con").style="display: none;";
            document.getElementById("additional_price_con").style="display: none;";
        }else{
            document.getElementById("price_con").style="display: block;";
            document.getElementById("additional_price_con").style="display: block;";
        }
    }
</script>

<?php include_once(plugin_dir_path(__FILE__) . '/proatt_management.php'); ?>