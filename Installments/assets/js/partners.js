function wizstep(stepnum){
    stepnumber = "wizstep" + stepnum;
    document.querySelectorAll('[id^="wizstep"]').forEach(function(element) {
        element.style="display: none;";
    });
    document.getElementById(stepnumber).style="display: block;";
}

    const ins_product_count = document.querySelector('[name="ins_product_count"]');
	const ins_product_price = document.querySelector('[name="ins_product_price"]');
	const ins_product_totalprice = document.querySelector('[name="ins_product_totalprice"]');
	
	ins_product_count.addEventListener('input', updateTotalPrice);
	ins_product_price.addEventListener('input', updateTotalPrice);
	
	function updateTotalPrice() {
	    const count = ins_product_count.value;
	    const price = ins_product_price.value;
	    
	    ins_product_totalprice.value = (count * price) ;
	}
	
	
	
    var rowcounter = 1;

   	function addtofac() {
	  var table = document.getElementById("factortable");
	  var newRow = table.insertRow();
	  newRow.id = "cell" + rowcounter;
	  var cell1 = newRow.insertCell(0);
	  cell1.innerHTML = rowcounter;
	  var cell2 = newRow.insertCell(1);
	  cell2.innerHTML = document.getElementsByName('ins_product')[0].value;
	  var cell3 = newRow.insertCell(2);
	  cell3.innerHTML = document.getElementsByName('ins_product_count')[0].value;
	  var cell4 = newRow.insertCell(3);
	  cell4.innerHTML = document.getElementsByName('ins_product_price')[0].value + " ریال ";
	  var cell5 = newRow.insertCell(4);
	  cell5.innerHTML = document.getElementsByName('ins_product_totalprice')[0].value + " ریال ";
	  rowcounter++;
	  var cell6 = newRow.insertCell(5);
	  cell6.innerHTML = "<button type='button' class='btn btn-warning' onclick='delete_table_row(" + rowcounter + ")'>حذف</buton>";
	  rowcounter++;
	}
	
	function delete_table_row(sent_num){
		var remove_table_element_id = "cell" + sent_num;
		document.getElementById(remove_table_element_id).style="background-color: black;";
	}

    
    
    
    //aghsattable
    function update_aghsat_table_total_value(){
        var newRow = document.getElementById('aghsat_table').insertRow(-1);
        newRow.style = 'background-color: #eee;';
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        cell1.innerHTML = '-';
        cell2.innerHTML = 'جمع:';
        cell2.setAttribute('id', 'total_value_selected');
        document.getElementById('total_price_on_aghsat_table').value = document.getElementById('ins_price_for_table').value * 1.1574;
        cell3.innerHTML = (document.getElementById('ins_price_for_table').value * 1.1574) + ' ریال ';
    }
    
    function update_aghsat_table(duration_value_sent){
        var sent_duration_value = duration_value_sent;
        
        document.getElementById('table_aghsat_holder').innerHTML = "<table id='aghsat_table'><th class='aghsathead'>شماره قسط</th><th class='aghsathead'>تاریخ قسط</th><th class='aghsathead'>مبلغ قسط</th></table>";
        
        var aghsat_table_rowcounter = 1;
        var table_aghsat_list = document.getElementById('aghsat_table');
        let aghsat_dates = document.getElementById('aghsat_date').value;
        let aghsat_parts = aghsat_dates.split('/');
        let aghsat_year = aghsat_parts[0];
        let aghsat_month = aghsat_parts[1];
        let aghsat_day = aghsat_parts[2];
        
        if(sent_duration_value == 632){
            duration_selected = 3;
            steps_selected = 2;
        }else if(sent_duration_value == 12121){
            duration_selected = 12;
            steps_selected = 1;
        }else if(sent_duration_value == 1262){
            duration_selected = 6;
            steps_selected = 2;
        }else{
            duration_selected = 0;
        }
        for (var i = 1; i <= duration_selected; i++) {
            var row = table_aghsat_list.insertRow(-1);
            var cell1 = row.insertCell(0);
            cell1.innerHTML = i;
            var cell2 = row.insertCell(1);
            aghsat_month = parseInt(aghsat_month) + steps_selected;
            if(aghsat_month >= 13){
                aghsat_month = 1;
                aghsat_year = parseInt(aghsat_year) + steps_selected;
            } 
            cell2.innerHTML = aghsat_year + '/' + aghsat_month + '/' + aghsat_day;
            var cell3 = row.insertCell(2);
            cell3.innerHTML = (document.getElementById('total_price_on_aghsat_table').value / duration_selected) + ' ریال ';
        }
        
        update_aghsat_table_total_value();
        
    }
    
   	function calculatePriceTable() {
        if(document.getElementById("ins_selling_table").value == 632){
            document.getElementById("ins_pure_price_for_table").value = "خالص دریافتی: " + (document.getElementById("ins_price_for_table").value * 0.84) + " ریال ";
        }else{
            document.getElementById("ins_pure_price_for_table").value = "خالص دریافتی: " + (document.getElementById("ins_price_for_table").value * 0.79) + " ریال ";
        }
    }
    
    function place_product_table_on_field(){
        document.getElementById('products_order_table').value = document.getElementById('products_order_table_holder').innerHTML;
    }
    function table_aghsat_holder_update(){
        document.getElementById('table_aghsat_holder_input').value = document.getElementById('table_aghsat_holder').innerHTML;
    }