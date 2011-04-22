<?php
	include("../utils/database_connection.php");
	$id = $_POST['product'];
	database_connect();

	$query = "SELECT * FROM Stock WHERE RefInterne='$id'";
	$res = database_query($query);
	echo '<table border="1">';
	echo '<tr><td>Repository name</td><td>Stock Quantity</td></tr>';
	while($row = $res->fetch()){
		echo '<tr>';
		echo '<td>';
		echo $row['NomE'];
		echo '</td><td>';
		echo $row['Quantite'];
		echo '</td>';
	}
?>

