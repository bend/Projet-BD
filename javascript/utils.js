
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

function add_clients(){
	// TODO DO BETTER CHECK HERE
        // TODO A CLIENT CAN ALSO BE A SUPPLIER
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	if(document.getElementById("name").value=="" || document.getElementById("vatnum").value == "" || document.getElementById("roadname").value==""){
		alert("Please fill Name, VAT and road fields");
		document.getElementById("loading").innerHTML= "";
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
		if(xmlHttp.responseText == true)
			return;
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
