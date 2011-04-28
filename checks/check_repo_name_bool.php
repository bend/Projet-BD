<?php
	include("../utils/database_connection.php");
	$name = $_GET['name'];
	database_connect();
	
	$check = "SELECT NomE FROM Entrepot WHERE NomE= '$name'";
	$result = database_query($check);
	if($result->rowCount()>0)
		echo true;
	echo false;
?>
