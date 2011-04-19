
function add_clients(){
	// TODO DO BETTER CHECK HERE
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	if(document.getElementById("name").value=="" || document.getElementById("vatnum").value == "" || document.getElementById("roadname").value==""){
		alert("Please fill Name, VAT and road fields");
		document.getElementById("loading").innerHTML= "";
		return;
	}
	/* Check that numbers are numbers */
	
	if(!is_num(document.getElementById("postcode").value) || !is_num(document.getElementById("roadnumber").value)){
		document.getElementById("loading").innerHTML = "";
		return;
	}
	
	
	/* Check the uniqueness of the VAT NUM */
    xmlHttp=GetXmlHttpObject();
    if (xmlHttp==null){
        alert ("Browser does not support HTTP Request");
		document.getElementById("loading").innerHTML= "";
        return;
    }
    var url="checks/check_num_vat_bool_client.php";
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
	var url="registration/register_client.php";
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


function check_numvat_client(str){
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
    var url="checks/check_num_vat_client.php";
    url=url+"?vatnum="+str;
    xmlHttp.open("GET",url,false);
    xmlHttp.send(null);
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
    	document.getElementById("available").innerHTML=xmlHttp.responseText;
		show("#available");
		var temp = xmlHttp.responseText;
		if(check_vat_both(str)==true && temp=="")
			load_client(document.getElementById("vatnum").value);
		return;
	}
}


function load_client(numtva){
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
	document.getElementById("date_last_buy").value = array[8];
	document.getElementById("loading").innerHTML="";
	
	document.getElementById("button_ok").disabled = false;
}


function update_client(){
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	if(document.getElementById("name").value=="" || document.getElementById("vatnum").value == "" || document.getElementById("roadname").value==""){
		alert("Please fill Name, VAT and road fields");
		document.getElementById("loading").innerHTML= "";
		return;
	}
	/* Check that numbers are numbers */
	
	if(!is_num(document.getElementById("postcode").value) || !is_num(document.getElementById("roadnumber").value)){
		document.getElementById("loading").innerHTML = "";
		return;
	}
	
	var xmlHttp=GetXmlHttpObject();
	var url="updates/client_update.php";
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

function load_client_addresses(){
	load_subscreen("subscreens/client_localisation.php");
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	var xmlHttp=GetXmlHttpObject();
	var parameters="";
	var url="gmaps/client_addr_list.php";
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

