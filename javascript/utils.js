

function show(balise){
	 $(balise).hide();
	 $(balise).fadeIn(500);
}

function show_all(){
	 show("#header");   
	 show("#menu");     
	 show("#contents"); 
	 show("#footer"); 
}

function load_subscreen(page){
    var request = this.GetXmlHttpObject();
    request.open('GET' , page ,false);
    request.send(null);
    if (request.readyState==4 || request.readyState=="complete"){
    	document.getElementById("screen_body").innerHTML=request.responseText;
		show("#screen_body");
   		return ;
    }
}


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
    var url="checks/check_num_vat_bool.php";
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
    var url="checks/check_num_vat_bool.php";
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


function add_repo(){
	// TODO DO BETTER CHECK HERE
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	if(document.getElementById("name").value=="" || document.getElementById("roadname").value == "" || document.getElementById("roadnumber").value==""|| document.getElementById("suburb").value=="" || document.getElementById("postcode").value=="" || document.getElementById("country").value==""){
		alert("Please fill all the fields");
		document.getElementById("loading").innerHTML= "";
		return;
	}
	/* Check that the numbers are numbers */
	if(!is_num(document.getElementById("postcode").value) || !is_num(document.getElementById("roadnumber").value) ){
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
    var url="checks/check_repo_name_bool.php";
    url=url+"?name="+document.getElementById("name").value + "&roadname=" + encodeURI(document.getElementById("roadname").value)+"&roadnum=" + 
		encodeURI(document.getElementById("roadnumber").value)+"&town=" + encodeURI(document.getElementById("suburb").value)+
		"&code=" + encodeURI(document.getElementById("postcode").value)+"&country=" + encodeURI(document.getElementById("country").value);
    xmlHttp.open("GET",url,false);
    xmlHttp.send(null);
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		if(xmlHttp.responseText == true){
			document.getElementById("loading").innerHTML= "";
			return;
		}
	}

	var xmlHttp=GetXmlHttpObject();
	var url="registration/register_repo.php";
	var parameters = "name=" + encodeURI(document.getElementById("name").value) 
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


function add_product(){
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

function check_ref(str){
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

function check_numvat(str){
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
    var url="checks/check_num_vat.php";
    url=url+"?vatnum="+str;
    xmlHttp.open("GET",url,false);
    xmlHttp.send(null);
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
    	document.getElementById("available").innerHTML=xmlHttp.responseText;
		show("#available");
		return;
	}
} 

function check_isnum(str, id){
	if(!is_num(str)){
		document.getElementById(id).innerHTML="You must enter a number";
		show("#"+id);
	}else{
		document.getElementById(id).innerHTML="";
	}
}

function is_num(str){
	return !isNaN(str);
}

function check_repo_name(str){
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
    var url="checks/check_repo_name.php";
    url=url+"?name="+str;
    xmlHttp.open("GET",url,false);
    xmlHttp.send(null);
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
    	document.getElementById("available").innerHTML=xmlHttp.responseText;
		show("#available");
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
    var url="loads/client_load.php";
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
	document.getElementById("loading").innerHTML="";
	
	document.getElementById("button_ok").disabled = false;
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
	document.getElementById("imgpath").value = array[9];
	document.getElementById("loading").innerHTML="";
	
	document.getElementById("button_ok").disabled = false;
}

function update_client(){
	
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
