<?php
	include("../utils/database_connection.php");
	$query = "SELECT * FROM Entrepot";
	database_connect();
	$result = database_query($query);
	while($row = $result->fetch()){
		echo $row['NomE'];
		echo '#@%';
		echo $row['Numero'];
		echo ' ';
		echo $row['Rue'];
		echo ' ';
		echo $row['CodePostal'];
		echo' ';
		echo $row['Localite'];
		echo ' ';
		echo $row['Pays'];
		echo '#@%';
	}
	database_close();
?>
