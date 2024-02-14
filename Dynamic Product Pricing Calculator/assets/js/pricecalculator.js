change_price_on_product_change();
const selectElements = document.querySelectorAll('select');
                

                
selectElements.forEach(select => {
    if (select.id.startsWith('material-')) {
        select.addEventListener('change', () => {
            product_and_material = select.value;
            document.getElementById("totalcostpermeter").innerHTML = product_and_material;
            document.getElementById("matcheckholder").value = parseInt(product_and_material);
            document.getElementById("cabinetpriceforonemeter").innerHTML = product_and_material;
            document.getElementById("additionalpriceshow").innerHTML = parseInt(document.getElementById("scaleholder").value) * parseInt(document.getElementById("additional_cost").value);
            updatetotal();
        });
    }
});



function change_price_on_product_change() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].checked = false;
    }
    var productSelect = document.getElementById("product");
    var materialSelect = document.getElementById("material-" + productSelect.value);
    product_and_material = materialSelect.options[0].value;
    document.getElementById("totalcostpermeter").innerHTML = product_and_material;
    document.getElementById("cabinetpriceforonemeter").innerHTML = product_and_material;
    document.getElementById("matcheckholder").value = parseInt(product_and_material);
    document.getElementById("additionalpriceshow").innerHTML = parseInt(document.getElementById("scaleholder").value) * parseInt(document.getElementById("additional_cost").value);
    updatetotal();
  }
  
  
function sync_add_cost(){
    var cost = 0;
    var productSelectz = document.getElementById("product");
    var materialSelectz = document.getElementById("material-" + productSelectz.value);
    var add_cost_counter = document.getElementById("add_cost").options.length;
    for(var cost = 0; cost < add_cost_counter; cost++){
        if(document.getElementById("add_cost").options[cost].id == "add_cost-" + materialSelectz.options[materialSelectz.selectedIndex].id){
            document.getElementById("add_cost").options[cost].selected = true;
        }else{
            document.getElementById("add_cost").options[cost].selected = false;
        }
    }
    document.getElementById("additional_cost").value = document.getElementById("add_cost").value;
    //document.getElementById("additionalpriceshow").innerHTML = parseInt(document.getElementById("scale_holder").value) * parseInt(document.getElementById("additional_cost").value);
}
  
  
function addcheckbox(checkval, checkid){
    var product_and_material = parseInt(document.getElementById("totalcostpermeter").innerHTML);
    if(document.getElementById(checkid).checked){
        product_and_material = product_and_material + parseInt(checkval);
    }else{
        product_and_material = product_and_material - parseInt(checkval);
    }
    document.getElementById("totalcostpermeter").innerHTML = product_and_material;
    document.getElementById("matcheckholder").value = parseInt(product_and_material);
    document.getElementById("totalcostpermeter").value = document.getElementById("totalcostpermeter").value + ' تومان ';
}

var radioholder = [];

function addradio(radioval, radioid, radioname){
  var name = radioname;
  var value = radioval;
  var found = false;
  for (var i = 0; i < radioholder.length; i++) {
    if (radioholder[i][0] === name) {
      radioholder[i][1] = value;
      found = true;
      break;
    }
  }
  if (!found) {
    radioholder.push([name, value]);
  }
    var sum = parseInt(0);
    for (var h = 0; h < radioholder.length; h++) {
      sum = parseInt(sum) + parseInt(radioholder[h][1]);
    }
    document.getElementById("radioholder").value = sum;
    updatetotal();
}



var scaleholder = [];

function scalechange(scalevalue,scaledim,scaleid){
    var scalexis;
    var scaleyis;
    var name;
    var squaremeter;
    if(scaledim == 1){
        scalexis = "scale" + "x-" + scaleid;
        name = scalexis;
        scaleyis = document.getElementById("scale" + "y-" + scaleid).value;
        squaremeter = scalevalue * document.getElementById("scale" + "y-" + scaleid).value;
    }else{
        scaleyis = "scale" + "y-" + scaleid;
        name = scaleyis;
        scalexis = document.getElementById("scale" + "x-" + scaleid).value;
        squaremeter = scalevalue * document.getElementById("scale" + "x-" + scaleid).value;
    }
    var value = scalevalue;
    var found = false;
    for (var i = 0; i < scaleholder.length; i++) {
        if (scaleholder[i][0] === name) {
          scaleholder[i][1] = value;
          found = true;
          break;
        }
    }
        if (!found) {
          scaleholder.push([name, value]);
        }
    var sum = parseInt(0);
    for (var h = 0; h < scaleholder.length; h++) {
      sum = parseInt(sum) + parseInt(scaleholder[h][1]);
    }
    document.getElementById("scaleholder").value = sum;
    document.getElementById("additionalpriceshow").innerHTML = sum * document.getElementById("additional_cost").value;
    document.getElementById("aboutmeter").innerHTML = sum + ' متر مربع';
    document.getElementById("additionalpriceshow").innerHTML = parseInt(document.getElementById("scaleholder").value) * parseInt(document.getElementById("additional_cost").value);
    updatetotal();
}

function updatetotal(){
    sync_add_cost();
    document.getElementById("totalcostpermeter").innerHTML = (parseInt(document.getElementById("radioholder").value) + parseInt(document.getElementById("matcheckholder").value)) * parseInt(document.getElementById("scaleholder").value) + ' تومان ';
    document.getElementById("totalcost").innerHTML = ((parseInt(document.getElementById("radioholder").value) + parseInt(document.getElementById("matcheckholder").value)) * parseInt(document.getElementById("scaleholder").value)) + (parseInt(document.getElementById("scaleholder").value) * parseInt(document.getElementById("additional_cost").value)) +' تومان ';
    document.getElementById("additionalpriceshow").innerHTML = document.getElementById("additionalpriceshow").innerHTML + ' تومان ';
    document.getElementById("totalcostpermeter").value = document.getElementById("totalcostpermeter").value + ' تومان ';
}