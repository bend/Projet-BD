<?php
	include("../utils/database_connection.php");
	$name = $_GET['name'];
	database_connect();
	
	$check = "SELECT Nom from Entrepot where Nom= '$name'";
	$result = database_query($check);
	if($result->rowCount()>0)
		echo "Repo name already existing";
?>
