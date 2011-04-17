<?php
	include("../utils/database_connection.php");
	//TODO SELECT ONLY CLIENTS
	$query = "SELECT * FROM Identite";
	database_connect();
	$result = database_query($query);
	while($row = $result->fetch()){
		echo $row['Rue'];
		echo $row['Numero'];
		echo $row['Localite'];
		echo $row['CodePostal'];
		echo $row['Pays'];
	}
?>
