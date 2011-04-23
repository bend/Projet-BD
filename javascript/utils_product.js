function add_product(){
	// TODO DO BETTER CHECK HERE
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	if(document.getElementById("ref").value=="" || document.getElementById("barcode").value == "" || document.getElementById("sellprice").value==""|| document.getElementById("buyprice").value=="" || document.getElementById("vatrate").value==""){
		alert("Please fill Ref, Barcode, VAT rate  and sell price , buy price");
		document.getElementById("loading").innerHTML= "";
		return;
	}
	/* Check that the numbers are numbers */
	if(!is_num(document.getElementById("ref").value) || !is_num(document.getElementById("contenance").value) || !is_num(document.getElementById("barcode").value) || !is_num(document.getElementById("sellprice").value)   || !is_num(document.getElementById("buyprice").value) || !is_num(document.getElementById("vatrate").value) ){
		document.getElementById("loading").innerHTML = "";
		return;
	}

	/* Check the uniqueness of the Ref NUM */
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request");
		document.getElementById("loading").innerHTML= "";
		returnh
	}
	var url="checks/check_ref_bool.php";
	url=url+"?ref="+document.getElementById("ref").value;
	xmlHttp.open("GET",url,false);
	xmlHttp.send(null);
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		if(xmlHttp.responseText == true){
			document.getElementById("loading").innerHTML= "";
			return;
		}
	}

	var xmlHttp=GetXmlHttpObject();
	var url="registration/register_product.php";
	var parameters = "ref=" + encodeURI(document.getElementById("ref").value) +"&brand=" + 
		encodeURI(document.getElementById("brand").value)+"&denom=" + encodeURI(document.getElementById("denom").value)+"&description=" + encodeURI(document.getElementById("description").value)+"&contenance=" + 	encodeURI(document.getElementById("contenance").value)+"&barcode=" + encodeURI(document.getElementById("barcode").value)+"&sellprice=" + encodeURI(document.getElementById("sellprice").value)+"&buyprice=" +
		encodeURI(document.getElementById("buyprice").value)+"&vatrate=" + encodeURI(document.getElementById("vatrate").value) + "&imgpath=" + encodeURI(document.getElementById("imgpath").value);
	xmlHttp.open('POST', url, false);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);

	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("screen_body").innerHTML=xmlHttp.responseText;
		show("#screen_body");
		return;
	}
}

function load_product(ref){
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request");
		return;
	}
	var url="loads/product_load.php";
	url=url+"?ref="+ref;
	xmlHttp.open("GET",url,false);
	xmlHttp.send(null);
	var resp = xmlHttp.responseText;
	var array = resp.split("#@%");
	document.getElementById("ref").value = array[0];
	document.getElementById("brand").value = array[1];
	document.getElementById("denom").value = array[2];
	document.getElementById("description").value = array[3];
	document.getElementById("contenance").value = array[4];
	document.getElementById("barcode").value = array[5];
	document.getElementById("sellprice").value = array[6];
	document.getElementById("buyprice").value = array[7];
	document.getElementById("vatrate").value = array[8];
	document.getElementById("imgpath").width= 200;
	document.getElementById("imgpath").value = array[9];
	document.getElementById("imgpath").src = array[9];
	document.getElementById("zoom_img").href = array[9];
	document.getElementById("loading").innerHTML="";
	document.getElementById("button_ok").disabled = false;

}

function update_product(){
	// TODO DO BETTER CHECK HERE
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	if(document.getElementById("ref").value=="" || document.getElementById("barcode").value == "" || document.getElementById("sellprice").value==""|| document.getElementById("buyprice").value=="" || document.getElementById("vatrate").value==""){
		alert("Please fill Ref, Barcode, VAT rate  and sell price , buy price");
		document.getElementById("loading").innerHTML= "";
		return;
	}
	/* Check that the numbers are numbers */
	if(!is_num(document.getElementById("contenance").value) || !is_num(document.getElementById("barcode").value) || !is_num(document.getElementById("sellprice").value)   || !is_num(document.getElementById("buyprice").value) || !is_num(document.getElementById("vatrate").value) ){
		document.getElementById("loading").innerHTML = "";
		return;
	}

	var xmlHttp=GetXmlHttpObject();
	var url="updates/product_update.php";
	var parameters = "ref=" + encodeURI(document.getElementById("ref").value) +"&brand=" + 
		encodeURI(document.getElementById("brand").value)+"&denom=" + encodeURI(document.getElementById("denom").value)+"&description=" + encodeURI(document.getElementById("description").value)+"&contenance=" + 	encodeURI(document.getElementById("contenance").value)+"&barcode=" + encodeURI(document.getElementById("barcode").value)+"&sellprice=" + encodeURI(document.getElementById("sellprice").value)+"&buyprice=" +
		encodeURI(document.getElementById("buyprice").value)+"&vatrate=" + encodeURI(document.getElementById("vatrate").value) + "&imgpath=" + encodeURI(document.getElementById("imgpath").value);
	xmlHttp.open('POST', url, false);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);

	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("screen_body").innerHTML=xmlHttp.responseText;
		show("#screen_body");
		return;
	}
}


function check_ref(str){
	if (str.length==0){
		document.getElementById("available").innerHTML="";
		show("#available");
		return;
	}
	if(!is_num(str)){
		document.getElementById("available").innerHTML="You must enter a number";
		show("#available");
		return;
	}
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request");
		return;
	}
	var url="checks/check_ref.php";
	url=url+"?ref="+str;
	xmlHttp.open("GET",url,false);
	xmlHttp.send(null);
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("available").innerHTML=xmlHttp.responseText;
		show("#available");
		return;
	}
} 


function load_pro(ref){
	$.fancybox.close();
	load_subscreen('subscreens/product_view.php');
	load_product(ref);
}

function list_union_quantity(repo){
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	var xmlHttp=GetXmlHttpObject();
	var url="lists/list_union_quantity.php";
	var parameters = "product=" + encodeURI(document.getElementById("product_list").value) + 
		"&repo="+encodeURI(repo);
	xmlHttp.open('POST', url, false);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("quantity").innerHTML=xmlHttp.responseText;
		show("#quantity");
	}
	document.getElementById("loading").innerHTML="";

}


function load_product_repo(id){

	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	var xmlHttp=GetXmlHttpObject();
	var url="loads/product_repo_load.php";
	var parameters = "product=" + encodeURI(id);
	xmlHttp.open('POST', url, false);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("table-stock").innerHTML=xmlHttp.responseText;
		show("#table-stock");
	}
	document.getElementById("loading").innerHTML="";
}
