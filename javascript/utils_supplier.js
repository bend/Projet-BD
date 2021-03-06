function GetXmlHttpObject(){
	var xmlHttp=null;
	try{// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}catch (e){// Internet Explorer
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}catch (e){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}


function add_supplier(){
	/* Check that numbers are numbers */

	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	if(document.getElementById("name").value=="" || document.getElementById("vatnum").value == "" || document.getElementById("roadname").value=="" || document.getElementById("roadnumber").value=="" || document.getElementById("suburb").value=="" || document.getElementById("country").value==""){
		alert("Please fill all required fields");
		document.getElementById("loading").innerHTML= "";
		return;
	}
	if(!is_int(document.getElementById("postcode").value) || !is_int(document.getElementById("roadnumber").value)){
		document.getElementById("loading").innerHTML = "";
		return;
	}

	/* Check the format of vat num */
	if(!is_valid_vat_num(document.getElementById("vatnum").value)){
		document.getElementById("loading").innerHTML="";
		document.getElementById("available").innerHTML="Invalid VAT Number";
		show("#available");
		return;
	}

	/* Check the uniqueness of the VAT NUM */
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request");
		document.getElementById("loading").innerHTML= "";
		return;
	}
	var url="checks/check_num_vat_bool_supplier.php";
	url=url+"?vatnum="+document.getElementById("vatnum").value;
	xmlHttp.open("GET",url,false);
	xmlHttp.send(null);
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		if(xmlHttp.responseText == true){
			document.getElementById("loading").innerHTML= "";
			return;
		}
	}

	var xmlHttp=GetXmlHttpObject();
	var url="registration/register_supplier.php";
	var parameters = "name=" + encodeURI(document.getElementById("name").value) +"&surname=" + 
		encodeURI(document.getElementById("surname").value)+"&vat=" + encodeURI(document.getElementById("vatnum").value)+
		"&roadname=" + encodeURI(document.getElementById("roadname").value)+"&roadnum=" + 
		encodeURI(document.getElementById("roadnumber").value)+"&town=" + encodeURI(document.getElementById("suburb").value)+
		"&code=" + encodeURI(document.getElementById("postcode").value)+"&country=" +
		encodeURI(document.getElementById("country").value);
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



function update_supplier(){
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	if(document.getElementById("name").value=="" || document.getElementById("vatnum").value == "" || document.getElementById("roadname").value=="" || document.getElementById("roadnumber").value=="" || document.getElementById("suburb").value=="" || document.getElementById("country").value==""){
		alert("Please fill all required fields");
		document.getElementById("loading").innerHTML= "";
		return;
	}

	if(!is_int(document.getElementById("postcode").value) || !is_int(document.getElementById("roadnumber").value)){
		document.getElementById("loading").innerHTML = "";
		return;
	}
	//Translate the Banckrupcy value
	var banckrupt=0;
	if(document.getElementById("banckrupt").value == 'YES')
		banckrupt=1;
	else if(document.getElementById("banckrupt").value =='NO' || document.getElementById("banckrupt").value =="" )
		banckrupt=0;
	else{
		document.getElementById("loading").innerHTML= "";
		return;
	}

	var xmlHttp=GetXmlHttpObject();
	var url="updates/supplier_update.php";
	var parameters = "name=" + encodeURI(document.getElementById("name").value) +"&surname=" + 
		encodeURI(document.getElementById("surname").value)+"&vat=" + encodeURI(document.getElementById("vatnum").value)+
		"&roadname=" + encodeURI(document.getElementById("roadname").value)+"&roadnum=" + 
		encodeURI(document.getElementById("roadnumber").value)+"&town=" + encodeURI(document.getElementById("suburb").value)+
		"&code=" + encodeURI(document.getElementById("postcode").value)+"&country=" +
		encodeURI(document.getElementById("country").value)+"&banckrupt="+encodeURI(banckrupt); 
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

function check_numvat_supplier(str){
	if(!is_valid_vat_num(str)){
		document.getElementById("available").innerHTML="Invalid VAT Number";
		show("#available");
		return;
	}
	if (str.length==0){
		document.getElementById("available").innerHTML="";
		show("#available");
		return;
	}
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request");
		return;
	}
	var url="checks/check_num_vat_supplier.php";
	url=url+"?vatnum="+str;
	xmlHttp.open("GET",url,false);
	xmlHttp.send(null);
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("available").innerHTML=xmlHttp.responseText;
		show("#available");
		var temp = xmlHttp.responseText;
		if(check_vat_both(str)==true && trim(temp)=="")
			load_supplier(document.getElementById("vatnum").value);
		return;
	}
}


function load_supplier(numtva){
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request");
		return;
	}
	var url="loads/supplier_load.php";
	url=url+"?vatnum="+numtva;
	xmlHttp.open("GET",url,false);
	xmlHttp.send(null);
	var resp = xmlHttp.responseText;
	var array = resp.split("#@%");

	document.getElementById("name").value = array[0];
	document.getElementById("surname").value = array[1];
	document.getElementById("vatnum").value = array[2];
	document.getElementById("roadname").value = array[3];
	document.getElementById("roadnumber").value = array[4];
	document.getElementById("suburb").value = array[5];
	document.getElementById("postcode").value = array[6];
	document.getElementById("country").value = array[7];
	if(array[8] == "0")
		document.getElementById("banckrupt").value = "NO";
	else
		document.getElementById("banckrupt").value = "YES";

	document.getElementById("loading").innerHTML="";
	document.getElementById("button_ok").disabled = false;
}


function load_supplier_addresses(){
	load_subscreen("subscreens/supplier_localisation.php");
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	var xmlHttp=GetXmlHttpObject();
	var parameters="";
	var url="gmaps/supplier_addr_list.php";
	xmlHttp.open('POST', url, false);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);

	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		var resp = xmlHttp.responseText;
		var array_addr = resp.split("#@%");
		var mark = new Array();
		for(i=0; i<array_addr.length-1;i+=2){
			mark.push({address:array_addr[i+1], html:array_addr[i] +"<br/>"+ array_addr[i+1]});
		}
		var options ={
			markers: mark,
			zoom:5

		};
		$("#map").gMap(options);
		show("#map");
		document.getElementById("loading").innerHTML= "";
		return;
	}
}


function load_sup(id){
	load_subscreen('subscreens/supplier_view.php');
	load_supplier(id);
}

