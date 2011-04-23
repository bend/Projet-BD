<div id="sub_menu_title">
	<div id="date"></div>
</div>
<div id="sub_menu_contents">
	<div id="time">
		<script type="text/javaScript">var clocksize=150;</script>
		<script src="http://gheos.net/js/clock.js"></script>
	</div>	
</div>


<script type="text/javascript">
	var currentDate = new Date()
	var day = currentDate.getDate()
	var month = currentDate.getMonth()
	var year = currentDate.getFullYear()
	document.getElementById("date").innerHTML = ( day + "/" + month + "/" + year )
</script>
