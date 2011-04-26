function load_top_products_chart(){

	var day_from = document.getElementById("day_from").value;
	var day_to = document.getElementById("day_to").value;
	var month_from = document.getElementById("month_from").value;
	var month_to = document.getElementById("month_to").value;
	var year_from = document.getElementById("year_from").value;
	var year_to = document.getElementById("year_to").value;
	
	if(day_from.indexOf("DAY")>-1 || day_to.indexOf("DAY")>-1 || month_from.indexOf("MONTH")>-1 || month_to.indexOf("MONTH")>-1 || year_from.indexOf("YEAR")>-1 || year_to.indexOf("YEAR")>-1){
		alert("Please choose the dates");
		return;
	}

	var url='stats/top_product.php?year_from='+year_from+'&month_from='+month_from+'&day_from='+day_from+'&year_to='+year_to+'&month_to='+month_to+'&day_to='+day_to+'&n=10';
	document.getElementById("chart").innerHTML='<img src="'+url+'"/>';
}
