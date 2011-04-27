function load_top_products_chart(){
	var month_from = document.getElementById("month_from").value;
	var month_to = document.getElementById("month_to").value;
	var year_from = document.getElementById("year_from").value;
	var year_to = document.getElementById("year_to").value;
	
	if(month_from.indexOf("MONTH")>-1 || month_to.indexOf("MONTH")>-1 || year_from.indexOf("YEAR")>-1 || year_to.indexOf("YEAR")>-1){
		alert("Please choose the dates");
		return;
	}

	var url='stats/top_product.php?year_from='+year_from+'&month_from='+month_from+'&day_from=01&year_to='+year_to+'&month_to='+month_to+'&day_to=01&n=10';
	document.getElementById("chart").innerHTML='<img src="'+url+'"/>';
}

function load_profit_chart(){
	var year = document.getElementById("year").value;
	
	if( year.indexOf("YEAR")>-1){
		alert("Please choose the year");
		return;
	}

	var url='stats/benef_year.php?year='+year;
	document.getElementById("chart").innerHTML='<img src="'+url+'"/>';
}


function load_profit_week_chart(){
	var month = document.getElementById("month").value;
	var year = document.getElementById("year").value;
	var week = document.getElementById("week").value;
	
	if(month.indexOf("MONTH")>-1 || week.indexOf("WEEK")>-1 || year.indexOf("YEAR")>-1){
		alert("Please choose the dates");
		return;
	}

	var url='stats/benef_week.php?year='+year+'&month='+month+'&week=0'+week;
	document.getElementById("chart").innerHTML='<img src="'+url+'"/>';
}


function load_value_year_chart(){
	var year = document.getElementById("year").value;
	
	if( year.indexOf("YEAR")>-1){
		alert("Please choose the year");
		return;
	}

	var url='stats/total_value_year.php?year='+year;
	document.getElementById("chart").innerHTML='<img src="'+url+'"/>';
}
