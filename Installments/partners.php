<?php include_once(plugin_dir_path(__FILE__) . '/lib/queries.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ ); ?>assets/css/bootstrap.min.css">
	 <link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ ); ?>assets/css/viewer.css">
  <script src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/js/jquery.slim.min.js"></script>
  <script src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/js/popper.min.js"></script>
  <script src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php if(isset($_GET['view'])){ 
            	    echo '<a href="https://artavam.com/my-account/partners">بازگشت به پنل</a><style>button{ display: none; } .filesdownload{ margin: 10px; } table:first-of-type td:nth-child(6),table:first-of-type th:nth-child(6) { display: none; }</style><br><br>';
                    global $wpdb;
                    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}installments WHERE ins_id = {$_GET['view']}", ARRAY_A);
                    foreach ($results as $result) {
                        if($result['ins_selling_type'] == 1){ 
                    	    $get_selling_type = 'طرح فروش چکی';
                        }
                        if($result['ins_selling_pattern'] == 'home-appliances'){ 
                    	    $get_selling_patt = 'طرح لوازم خانگی ۳۰ الی ۸۰ میلیون تومان';
                        }
                        $melicart = '<a href="' . $result['melicart'] . '" class="filesdownload" target="_blank">کارت ملی</a>';
                        $shenasname = '<a href="' . $result['shenasname'] . '" class="filesdownload" target="_blank">شناسنامه</a>';
                        $buyfactor = '<a href="' . $result['buyfactor'] . '" class="filesdownload" target="_blank">فاکتور خرید</a>';
                        $tashilat = '<a href="' . $result['tashilat'] . '" class="filesdownload" target="_blank">تسهیلات</a>';
                        $agreement = '<a href="' . $result['agreement'] . '" class="filesdownload" target="_blank">قرارداد</a>';
                        $agreement_attachment = '<a href="' . $result['agreement_attachment'] . '" class="filesdownload" target="_blank">پیوست قرارداد</a>';
                        $payment_bill = '<a href="' . $result['payment_bill'] . '" class="filesdownload" target="_blank">چک اقساط</a>';
                        $zemanat_bill = '<a href="' . $result['zemanat_bill'] . '" class="filesdownload" target="_blank">چک ضمانت</a>';
                        $kala_delivery = '<a href="' . $result['kala_delivery'] . '" class="filesdownload" target="_blank">رسید تحویل</a>';
                        
                    	echo "درخواست کننده: {$result['ins_name']} {$result['ins_family']} <br> نام پدر: {$result['ins_father']} با کد ملی {$result['ins_melicode']} تلفن همراه: {$result['ins_mobile']} تلفن ثابت: {$result['ins_phone']} تاریخ تولد: {$result['ins_birthdate']} محل تولد: {$result['ins_birthplace']} شهر: {$result['ins_city']} کد پستی: {$result['ins_postal_code']} آدرس: {$result['ins_address']} <br> {$result['products_order_table']} <br> تاریخ ثبت: {$result['aghsat_date_is']} <br> {$get_selling_type} در {$get_selling_patt} مبلغ درخواستی: {$result['ins_price_for_table']} {$result['ins_pure_price_for_table']} <br> <div style='width: 100%; margin: 50px 0px;'>{$result['table_aghsat_holder_input']}</div> <br><br>{$melicart}<br> {$shenasname}<br> {$buyfactor}<br> {$tashilat}<br> {$agreement}<br> {$agreement_attachment}<br> {$payment_bill}<br> {$zemanat_bill}<br> {$kala_delivery}<br>";
                    }
                }else{  ?>
            <div class="col-lg-4 partners_sidebar">
                <li><a onclick="wizstep(1)">انتخاب تسهیلات</a></li>
                <li><a onclick="wizstep(2)">ثبت مشخصات فردی</a></li>
                <li><a onclick="wizstep(3)">فاکتور</a></li>
                <li><a onclick="wizstep(4)">تسهیلات</a></li>
                <li><a onclick="wizstep(5)">اقساط</a></li>
                <li><a onclick="wizstep(6)">مدارک</a></li>
                
                <li><a href="../">بازگشت به ناحیه کاربری</a></li>
            </div>
            <div class="col-lg-8">  
                <div id="wizstep0">
                    <?php include_once(plugin_dir_path(__FILE__) . '/lib/history.php'); ?>
                    <br><br>
                    هم اکنون می توانید درخواست خود را جهت اخذ وام فوری بدون ضامن ثبت کنید.
                <br><br>
                <button type="button" onclick="wizstep(1)" class="btn btn-success">شروع کنید</button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div id="wizstep1" class="wizstep active">
                        <h1>انتخاب تسهیلات</h1><br>
                        <div class="form-check col-lg-8">
                            <label class="form-check-label">وام فوری بدون ضامن</label>
                            <input type="text" value="<?php echo get_current_user_id(); ?>" class="hide" name="userid"/>
                          <input class="form-check-input" value="fori" type="radio" name="ins_title" checked>
                        </div>
                        <button type="button" onclick="wizstep(2)" class="btn btn-success">مرحله بعد</button>
                    </div>
                    <div id="wizstep2" class="wizstep">
                        <h1>ثبت مشخصات فردی</h1><br>
                        <div class="row">
                            <div class="col-lg-4"><input type="text" name="ins_name" placeholder="نام" class="form-control"></div>
                            <div class="col-lg-4"><input type="text" name="ins_family" placeholder="نام خانوادگی" class="form-control"></div>
                            <div class="col-lg-4"><input type="text" name="ins_father" placeholder="نام پدر" class="form-control"></div>
                            <div class="col-lg-4"><input type="number" name="ins_melicode" placeholder="کد ملی" class="form-control"></div>
                            <div class="col-lg-4"><input type="number" name="ins_mobile" placeholder="تلفن همراه" class="form-control"></div>
                            <div class="col-lg-4"><input type="number" name="ins_phone" placeholder="تلفن ثابت" class="form-control"></div>
                            <div class="col-lg-4"><input type="text" name="ins_birthdate" placeholder="تاریخ تولد ۱۳۶۰/۰۲/۰۵" class="form-control"></div>
                            <div class="col-lg-4"><input type="text" name="ins_birthplace" placeholder="محل صدور شناسنامه" class="form-control"></div>
                            <div class="col-lg-4"><input type="text" name="ins_city" placeholder="شهر" class="form-control"></div>
                            <div class="col-lg-4"><input type="number" name="ins_postal_code" placeholder="کد پستی" class="form-control"></div>
                            <div class="col-lg-8"><input type="text" name="ins_address" placeholder="آدرس" class="form-control"></div>
                        </div>
                        <button type="button" onclick="wizstep(3)" class="btn btn-success">مرحله بعد</button>
                        <button type="button" onclick="wizstep(1)" class="btn btn-warning">مرحله قبل</button>
                    </div>
                    <div id="wizstep3" class="wizstep">
                        <h1>فاکتور</h1><br>
                        <div class="row mb-4">
                            <div class="col-lg-3"><input type="text" class="form-control" placeholder="نام کالا" name="ins_product"></div>
                            <div class="col-lg-3"><input type="number" class="form-control" placeholder="تعداد کالا" name="ins_product_count"></div>
                            <div class="col-lg-3"><input type="number" class="form-control" placeholder="قیمت" name="ins_product_price"></div>
                            <div class="col-lg-3"><input type="text" class="form-control" placeholder="قیمت کل" name="ins_product_totalprice" disabled></div>
                            <div class="col-lg-12"><button type="button" class="btn btn-info" onclick="addtofac()">افزودن به فاکتور</button></div>
                            <br><br>
                        </div>
                        <div class="row">
                        	<div class="col-lg-12" id="products_order_table_holder">
                        		<table id="factortable">
                        			<th>ردیف</th>
                        			<th>نام کالا</th>
                        			<th>تعداد</th>
                        			<th>قیمت</th>
                        			<th>قیمت کل</th>
                        			<th>عملیات</th>
                        		</table>
                        	</div>
                        	<textarea name="products_order_table" id="products_order_table" class="hide"></textarea>
                        </div><br><br>
                        <button type="button" onclick="wizstep(4); place_product_table_on_field();" class="btn btn-success">مرحله بعد</button>
                        <button type="button" onclick="wizstep(2)" class="btn btn-warning">مرحله قبل</button>
                    </div>
                    <div id="wizstep4" class="wizstep">
                        <h1>تسهیلات</h1><br>
                        <input type="text" id="aghsat_date" name="aghsat_date_is" class="form-control graybg" value="<?php the_date('Y/m/d'); ?>"/>
                        <select class="form-control mt-2" name="ins_selling_type">
                        	<option value="0" selected disabled>نوع فروش</option>
                        	<option value="1">طرح فروش چکی</option>
                        </select>
                        <select class="form-control mt-2" name="ins_selling_pattern">
                        	<option value="0" selected disabled>طرح فروش</option>
                        	<option value="home-appliances">طرح لوازم خانگی ۳۰ الی ۸۰ میلیون تومان</option>
                        </select>
                        <div class="row">
                            <div class="col-lg-11">
                                <input type="number" class="form-control mt-2" onchange="calculatePriceTable(); table_aghsat_holder_update();" id="ins_price_for_table" name="ins_price_for_table" placeholder="مبلغ تسهیلات"/>
                            </div>
                            <div class="col-lg-1" style="padding-top: 15px;">
                                ریال
                            </div>
                        </div>
                        <select class="form-control mt-2" name="ins_selling_table" id="ins_selling_table" onchange="calculatePriceTable(); update_aghsat_table(this.value);">
                        	<option value="0" selected disabled>جدول اقساط</option>
                        	<option value="632">۶ ماهه در ۳ قسط به فاصله هر ۲ ماه</option>
                        	<option value="12121">۱۲ ماهه در ۱۲ قسط متوالی ماهیانه</option>
                        	<option value="1262">۱۲ ماهه در ۶ قسط به فاصله هر ۲ ماه</option>
                        </select>
                        <input type="text" class="form-control mt-2 graybg" name="ins_pure_price_for_table" id="ins_pure_price_for_table" placeholder="خالص دریافتی 0 ريال"/>
                        <br><br>
                        <button type="button" onclick="wizstep(5); table_aghsat_holder_update();" class="btn btn-success">مرحله بعد</button>
	                <button type="button" onclick="wizstep(3)" class="btn btn-warning">مرحله قبل</button>
                    </div>
                    <div id="wizstep5" class="wizstep">
                        <h1>اقساط</h1><br>
                        <input type="text" class="hide" id="total_price_on_aghsat_table" name="total_price_on_aghsat_table"/>
                        <div id="table_aghsat_holder">
                            
                        </div>
                        <textarea class="hide" id="table_aghsat_holder_input" name="table_aghsat_holder_input"></textarea>
                        <button type="button" onclick="wizstep(6)" class="btn btn-success">مرحله بعد</button>
                        <button type="button" onclick="wizstep(4)" class="btn btn-warning">مرحله قبل</button>
                    </div>
                    <div id="wizstep6" class="wizstep">
                        <h1>مدارک</h1><br>
                        لطفا مدارک زیر را دانلود، چاپ، تکمیل و در ادامه بارگزاری نمایید.<br>
                        <button type="button" onclick="downloadFile('request.docx')" class="btn btn-info">فرم درخواست تسهیلات</button>
                        <button type="button" onclick="downloadFile('agreement.docx')" class="btn btn-info">فرم قرارداد</button>
                        <button type="button" onclick="downloadFile('attach.docx')" class="btn btn-info">فرم پیوست قرارداد</button>
                        <button type="button" onclick="downloadFile('delivery.docx')" class="btn btn-info">فرم رسید تحویل کالا</button>
                        <br><br>
                        <strong>بارگزاری مدارک</strong><br>
                        کپی کارت ملی
                        <input type="file" class="form-control" name="melicart"/>
                        کپلی برگ اول شناسنامه
                        <input type="file" class="form-control" name="shenasname"/>
                        فاکتور خرید
                        <input type="file" class="form-control" name="buyfactor"/>
                        فرم درخواست تسهیلات
                        <input type="file" class="form-control" name="tashilat"/>
                        فرم قرارداد
                        <input type="file" class="form-control" name="agreement"/>
                        فرم پیوست قرارداد
                        <input type="file" class="form-control" name="agreement_attachment"/>
                        چک اقساط
                        <input type="file" class="form-control" name="payment_bill"/>
                        چک ضمانت
                        <input type="file" class="form-control" name="zemanat_bill"/>
                        رسید تحویل کالا
                        <input type="file" class="form-control" name="kala_delivery"/>
                        <br><br>
                        <input type="submit" class="btn btn-success" value="ثبت و ارسال فرم"><br><br>
                        <button type="button" onclick="wizstep(5)" class="btn btn-warning">مرحله قبل</button>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
   <script src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/js/partners.js"></script>
   <script>
       function downloadFile(sentfilereq) {
          var reqfile = sentfilereq;
          var fileUrl = '<?php echo plugin_dir_url( __FILE__ ); ?>attachments/' + reqfile;
          var a = document.createElement('a');
          a.href = fileUrl;
          a.download = fileUrl.substr(fileUrl.lastIndexOf('/') + 1);
          document.body.appendChild(a);
          a.click();
          document.body.removeChild(a);
        }

   </script>
</body>
</html>