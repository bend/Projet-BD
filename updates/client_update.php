<?php
	include("../utils/database_connection.php");
	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$vatnum =$_POST['vat'];
	$roadname=$_POST['roadname'];
	$roadnum=$_POST['roadnum'];
	$pcode=$_POST['code'];
	$town=$_POST['town'];
	$country=$_POST['country'];

	database_connect();
	$query = "UPDATE STOCK.Identite SET Nom='$name',Prenom='$surname' ,Rue='$roadname', Numero='$roadnum', Localite='$town', CodePostal='$pcode', Pays='$country' WHERE NumTVA='$vatnum'";
	database_edit($query);
	//TODO ADD BETTER VISUAL
	echo "Client updated";
?>
