<?php include_once(plugin_dir_path(__FILE__) . '/queries.php'); ?>
<?php include_once(plugin_dir_path(__FILE__) . '/../heading.php'); ?>


<div id="col-container" class="wp-clearfix">

<div id="col-left">
    <div class="col-wrap">
        <div class="form-wrap">
        <h2>افزودن معیارهای اندازه ای</h2>
        <form method="post" action="" class="validate">
        <div class="form-field form-required term-name-wrap">
        	<label for="sname">عنوان</label>
        	<input name="sname" id="tag-sname" type="text" value="" size="40" aria-required="true" aria-describedby="snamedesc">
        	<p id="snamedesc">برچسب نمایشی مناسبی برای این تب را بنویسید.</p>
        </div>
        	
        <div class="form-field form-required term-name-wrap">
        	<label for="scalex">عرض</label>
        	<input name="scalex" id="scalex" type="number" value="" size="40" aria-required="true" aria-describedby="scalex-description">
        	<label for="scaley">طول</label>
        	<input name="scaley" id="scaley" type="number" value="" size="40" aria-required="true" aria-describedby="scaley-description">
        	<p id="scaley-description">در فیلدهای بالا، تنها مقادیر ثابت را وارد نمایید. باقی موارد طبق نیازسنجی توسط کاربر وارد شده و در دیگری ضرب خواهند شد تا متر مربع به دست آید. هر فیلد که نیاز به وارد شدن توسط کاربر ندارد را برابر با 1 قرار دهید تا در ضریب تاثیری نداشته باشد.</p>
        </div>
        
        <div class="form-field form-required term-name-wrap">
        	<label for="spriority">اولویت نمایش</label>
        	<input name="spriority" id="spriority" type="number" value="" size="40" aria-required="true" aria-describedby="spriority-description">
        	<p id="spriority_description">ترتیب نمایش در صفحه مهم است؟ این فیلد را یک عدد دلخواه بگذارید تا جایگاه آن در اولویت نمایش را مشخص کنید. در غیر این صورت می توانید آن را خالی رها کنید. اگر دو فیلد با یک عدد اولویت نمایش یکسان باشند، یکی از آن ها بالاتر از دیگری نمایش داده می شود.</p>
        </div>
        	<p class="submit">
        		<input type="submit" name="submit" id="submit" class="button button-primary" value="ثبت">		<span class="spinner"></span>
        	</p>
        	</form>
        </div>
    </div>
</div>

<?php include_once(plugin_dir_path(__FILE__) . '/proatt_management.php'); ?>