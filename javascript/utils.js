

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
