<?php
	include("../utils/database_connection.php");
	$name=$_POST['name'];
	$roadname=$_POST['roadname'];
	$roadnum=$_POST['roadnum'];
	$pcode=$_POST['code'];
	$town=$_POST['town'];
	$country=$_POST['country'];

	database_connect();
	$query = "UPDATE STOCK.Entrepot SET Rue='$roadname', Numero='$roadnum', Localite='$town', CodePostal='$pcode', Pays='$country' WHERE Nom='$name'";
	database_edit($query);
	//TODO ADD BETTER VISUAL
	echo "Repository updated";
?>