<?php

global $wpdb;

$useridsearchfor = get_current_user_id();
$results = $wpdb->get_results("SELECT ins_id, ins_name, ins_family, ins_melicode, aghsat_date_is FROM {$wpdb->prefix}installments WHERE userid = {$useridsearchfor}", ARRAY_A);


if(count($results) >= 1){
    echo '<strong>سوابق درخواست ها<br></strong>';
}else{
    echo '<strong>تاکنون درخواستی ثبت نشده است.<br></strong>';
}
 
foreach ($results as $result) {
    echo "<a href='https://artavam.com/my-account/partners?view=" . $result['ins_id'] . "'>{$result['ins_name']} {$result['ins_family']} با کد ملی {$result['ins_melicode']} در تاریخ {$result['aghsat_date_is']}</a><br>";
}

echo '<br><br>';

?>