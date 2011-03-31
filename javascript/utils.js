

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
