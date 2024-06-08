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
    <div class="col-lg-8 product-card p-4">
        <h1>محاسبه گر اقساط</h1>
          <p>مبلغ درخواستی و مدت زمان بازپرداخت خود را مشخص کنید.</p>
        <div class="slidecontainer mt-4">
            مبلغ وام
            <input type="text" placeholder="10 میلیون تومان" id="showinstring" disabled/>
              <input type="range" min="10" max="80" value="10" step="0.5" onchange="update(this.value,'value');">
              <input type="hidden" id="priceholder" value="10000000">
              <div class="row">
                <div class="col-lg-12 helpcaption">
                  <span class="floatright">10 میلیون تومان</span>
                  <span class="floatleft">80 میلیون تومان</span>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-lg-6">
                  مدت زمان بازپرداخت
                </div>
                <div class="col-lg-6 ltr">
                  <button type="button" class="btn btn-success" id="duration_12" onclick="update(12,'duration');">12 ماهه</button>
                  <button type="button" class="btn btn-info" id="duration_6" onclick="update(6,'duration');">6 ماهه</button>
                </div>
              </div>
          </div>
      </div>
      <div class="col-lg-4 product-card p-4">
        <div class="mt-4 center"><h1><span id="selected_duration">6</span>ماهه</h1></div>
        <div class="mt-4 center">مبلغ قسط ماهیانه: <span id="eachpay">1881527</span> تومان</div>
        <div class="mt-4 center">مجموع کل اقساط: <span id="totalpay">11289159</span> تومان</div>
      </div>
  </div>
</div>
<script>
function update(theval, senttype){
  var typeis = senttype;
  var valueis = theval;
  var request_price;
  if (typeis == 'value'){
    request_price = valueis + "000000";
	  document.getElementById("showinstring").placeholder = valueis + " میلیون تومان";
    document.getElementById("priceholder").value = valueis * 1000000;
  }
  if (typeis == 'duration'){
    document.getElementById("selected_duration").innerHTML = valueis;
    if(valueis == 6){
      document.getElementById("duration_12").classList.remove("btn-success");
      document.getElementById("duration_12").classList.remove("btn-warning");
      document.getElementById("duration_6").classList.remove("btn-warning");
      document.getElementById("duration_6").classList.add("btn-success");
    }
    if(valueis == 12){
      document.getElementById("duration_6").classList.remove("btn-success");
      document.getElementById("duration_6").classList.remove("btn-warning");
      document.getElementById("duration_12").classList.remove("btn-warning");
      document.getElementById("duration_12").classList.add("btn-success");
    }
  }
  var sood = 0.1289159;
  var spltomonths = document.getElementById("selected_duration").innerHTML;
  var totalprice = document.getElementById("priceholder").value;
  var totalpay = parseInt(totalprice) + (totalprice * sood);
  document.getElementById("totalpay").innerHTML = Math.ceil(totalpay);
  document.getElementById("eachpay").innerHTML = Math.ceil(totalpay / spltomonths);
}
</script>
</body>
</html>
