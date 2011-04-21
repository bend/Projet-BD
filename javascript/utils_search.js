
function load_search_page(url,param){
    
	var xmlHttp = this.GetXmlHttpObject();
    var parameters = "search="+encodeURI(param);
	xmlHttp.open('POST' ,url ,false);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);

    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
    	document.getElementById("screen_body").innerHTML=xmlHttp.responseText;
		show("#screen_body");
    }
		$("a#zoom_img").fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
		});
}
