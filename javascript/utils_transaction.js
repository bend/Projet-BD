
function transaction_buy(){
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	if(document.getElementById("supplier_list").value=="-----" || document.getElementById("repository_list").value=="-----"){
		alert("Please select a supplier and a repository ");
		document.getElementById("loading").innerHTML= "";
		return;
	}
	
	if(document.getElementById("cart").value ==""){
		alert("You must at least add 1 product");
		document.getElementById("loading").innerHTML= "";
		return;
	}
	
	var xmlHttp=GetXmlHttpObject();
	var url="registration/register_transaction_buy.php";
	var parameters = "cart=" + encodeURI(document.getElementById("cart").value) +"&supplier=" + 
		encodeURI(document.getElementById("supplier_list").value)+"&repo=" + encodeURI(document.getElementById("repository_list").value);
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


function transaction_sell(){
	document.getElementById("loading").innerHTML= "<img src=\"img/loading.gif\" alt=\"click\"/>";
	if(document.getElementById("client_list").value=="-----"){
		alert("Please select a client ");
		document.getElementById("loading").innerHTML= "";
		return;
	}
	
	if(document.getElementById("cart").value ==""){
		alert("You must at least add 1 product");
		document.getElementById("loading").innerHTML= "";
		return;
	}
	
	var xmlHttp=GetXmlHttpObject();
	var url="registration/register_transaction_sell.php";
	var parameters = "cart=" + encodeURI(document.getElementById("cart").value) +"&client=" + 
		encodeURI(document.getElementById("client_list").value);
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

function add_to_cart(){
	var item = document.getElementById("product_list").value;
	var quantity = document.getElementById("quantity").value;
	var old = document.getElementById("cart").value;
	if(!is_num(quantity) || item=="-----"){
		document.getElementById("add_ok").innerHTML = "Please check values";
		$("#add_ok").fadeIn(100);
		$("#add_ok").fadeOut(1500); 	
		return;
	}
	document.getElementById("add_ok").innerHTML = "Item added";
	$("#add_ok").fadeIn(100);
	$("#add_ok").fadeOut(1500); 	
	document.getElementById("cart").value = old+item+"#"+quantity+"|";
	document.getElementById("quantity").value = "";
	document.getElementById("product_list").remove(document.getElementById("product_list").selectedIndex);
	document.getElementById("loading").innerHTML="";
}


function add_to_cart_sell(){
	var item = document.getElementById("product_list").value;
	var quantity = document.getElementById("quantity_list").value;
	var repo = document.getElementById("repo_list").value;
	var old = document.getElementById("cart").value;
	
	if(item=="-----" || quantity=="-----" || repo=="-----"){
		document.getElementById("add_ok").innerHTML = "Please check values";
		$("#add_ok").fadeIn(100);
		$("#add_ok").fadeOut(1500); 	
		return;
	}

	document.getElementById("add_ok").innerHTML = "Item added";
	$("#add_ok").fadeIn(100);
	$("#add_ok").fadeOut(1500); 	
	document.getElementById("cart").value = old+item+"#"+quantity+"#"+repo+"|";
	document.getElementById("quantity").value = "";
	document.getElementById("product_list").remove(document.getElementById("product_list").selectedIndex);
	document.getElementById("repo").innerHTML="<select id='repo_list'><option>-----</option></select>";
	document.getElementById("quantity").innerHTML="<select id='quantity_list'><option>-----</option></select>";
	document.getElementById("loading").innerHTML="";
}
