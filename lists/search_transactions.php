<?php
	include("../utils/database_connection.php");
	$val = $_POST['val'];
	$query = "SELECT *  From STOCK.Transaction WHERE IdTran LIKE '$val' OR NumTVA LIKE '$val%' OR Date LIKE '%$val%'";
	database_connect();
	$res = database_query($query);
	if($res->rowCount()==0)
		echo 'No Results Found';
	while($temp = $res->fetch()){
		echo '<a href="javascript:;" onclick="javascript:load_transaction(';
		echo $temp['IdTran'];
		echo ');">';
		echo 'ID: ';
		echo $temp['IdTran'];
		echo '	Date: ';
		echo $temp['Date'];
		echo '	Hour: ';
		echo $temp['Heure'];
		echo "</a>";
		echo "<br/>";
	}
	$res->closeCursor();
?>
