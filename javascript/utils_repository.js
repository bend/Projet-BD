

function load_repository(name){
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request");
		return;
	}
	var url="loads/repository_load.php";
	url=url+"?name="+name;
	xmlHttp.open("GET",url,false);
	xmlHttp.send(null);
	var resp = xmlHttp.responseText;
	var array = resp.split("#@%");

	document.getElementById("name").value = array[0];
	document.getElementById("roadname").value = array[1];
	document.getElementById("roadnumber").value = array[2];
	document.getElementById("suburb").value = array[3];
	document.getElementById("postcode").value = array[4];
	document.getElementById("country").value = array[5];
	document.getElementById("loading").innerHTML="";

	document.getElementById("button_ok").disabled = false;
}


function update_repository(){
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

	var xmlHttp=GetXmlHttpObject();
	var url="updates/repository_update.php";
	var parameters = "name=" + encodeURI(document.getElementById("name").value) + "&roadname=" + encodeURI(document.getElementById("roadname").value)+ "&roadnum=" +
		encodeURI(document.getElementById("roadnumber").value)+"&town=" + encodeURI(document.getElementById("suburb").value)+
		"&code=" + encodeURI(document.getElementById("postcode").value)+"&country=" + encodeURI(document.getElementById("country").value);
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
	var parameters = "name=" + encodeURI(document.getElementById("name").value) + "&roadname=" + encodeURI(document.getElementById("roadname").value)+ "&roadnum=" +
		encodeURI(document.getElementById("roadnumber").value)+"&town=" + encodeURI(document.getElementById("suburb").value)+
		"&code=" + encodeURI(document.getElementById("postcode").value)+"&country=" + encodeURI(document.getElementById("country").value);
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


function list_union_repo(prod){
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	var xmlHttp=GetXmlHttpObject();
	var url="lists/list_union_repo.php";
	var parameters = "product=" + encodeURI(document.getElementById("product_list").value);
	xmlHttp.open('POST', url, false);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("repo").innerHTML=xmlHttp.responseText;
		show("#rep");
	}
	document.getElementById("loading").innerHTML="";
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

function list_products_in_repo(){
	var repo_name = document.getElementById("repository_list1").value;
	var xmlHttp=GetXmlHttpObject();
	var url="lists/list_union_repo_prod.php";
	var parameters = "repo=" + encodeURI(repo_name);
	xmlHttp.open('POST', url, false);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("prodo").innerHTML=xmlHttp.responseText;
		show("#prodo");
	}
	document.getElementById("loading").innerHTML="";

}


function transfert_stock(from, to, prod, quantity){
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	if(from=="-----" || to=="-----" || prod=="-----" || quantity=="-----"){
		alert("Please select all the fields");
		document.getElementById("loading").innerHTML= "";
		return;
	}
	if(from==to){
		alert("Cannot Transfert to same repo");
		document.getElementById("loading").innerHTML= "";
		return;
	}

	var xmlHttp=GetXmlHttpObject();
	var url="updates/update_move_stock.php";
	var parameters = "from=" + encodeURI(from)+"&to="+encodeURI(to)+"&prod="+encodeURI(prod)+"&quantity="+ encodeURI(quantity);
	xmlHttp.open('POST', url, false);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("screen_body").innerHTML=xmlHttp.responseText;
		show("#screen_body");
	}
	document.getElementById("loading").innerHTML="";


}

function load_repo_addresses(){
	load_subscreen("subscreens/repo_localisation.php");
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	var xmlHttp=GetXmlHttpObject();
	var parameters="";
	var url="gmaps/repo_addr_list.php";
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


function load_stock_in_repo(){
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	var xmlHttp=GetXmlHttpObject();
	var parameters="repo="+encodeURI(document.getElementById("repository_list1").value);
	var url="loads/stock_load.php";
	xmlHttp.open('POST', url, false);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);

	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		document.getElementById("table-stock").innerHTML=xmlHttp.responseText;
	}
	$("a#load_pro").fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
	});
	document.getElementById("loading").innerHTML= "";
}






