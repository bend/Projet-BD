<?php
	include("../utils/database_connection.php");
	$name=$_POST['name'];
	$roadname=$_POST['roadname'];
	$roadnum=$_POST['roadnum'];
	$pcode=$_POST['code'];
	$town=$_POST['town'];
	$country=$_POST['country'];

	database_connect();
	$query = "INSERT INTO STOCK.Identite(NumTVA,Nom,Prenom,DateAjout, Rue, Numero, Localite, CodePostal, Pays) VALUES('$vatnum','$name','$surname',CURDATE(), '$roadname', '$roadnum', '$town', '$pcode', '$country')";
	//TODO ADD BETTER VISUAL
	echo "Repository added";
?>
