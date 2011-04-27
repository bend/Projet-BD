<?php
	include("../utils/database_connection.php");
	$ref = $_GET['ref'];
	database_connect();
	
	$check = "SELECT RefInterne FROM TypeProduit WHERE RefInterne = '$ref'";
	$result = database_query($check);
	if($result->rowCount()>0)
		echo "Ref already existing";
?>
