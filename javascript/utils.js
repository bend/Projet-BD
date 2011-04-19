
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

function check_vat_both(str){
    var url="checks/check_num_vat_bool_client.php";
    url=url+"?vatnum="+str;
    xmlHttp.open("GET",url,false);
    xmlHttp.send(null);
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		if(xmlHttp.responseText ==true)
			return true;
	}

    var url="checks/check_num_vat_bool_supplier.php";
    url=url+"?vatnum="+str;
    xmlHttp.open("GET",url,false);
    xmlHttp.send(null);
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		if(xmlHttp.responseText == true)
			return true;
	}
	return false;
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

function check_isbool(val,id){
	if(val != "YES" &&  val !="NO" &&val!=""){
		document.getElementById(id).innerHTML= "Please enter YES or NO";
		show('#'+id);
	}
	else document.getElementById(id).innerHTML = "";
	return;
}

