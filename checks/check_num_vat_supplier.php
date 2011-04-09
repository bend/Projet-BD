<?php
	include("../utils/database_connection.php");
	$vatnum = $_GET['vatnum'];
	database_connect();
	
	$check = "SELECT NUMTVA from Fournisseur where NumTVA = '$vatnum'";
	$result = database_query($check);
	if($result->rowCount()>0)
		echo "Num VAT already existing in suppliers";
?>
