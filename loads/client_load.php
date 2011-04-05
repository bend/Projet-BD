<?php
	include("../utils/database_connection.php");
	$vatnum = $_GET['vatnum'];
	database_connect();

	$query = "SELECT * from Identite where NumTVA = '$vatnum'";
	$res = database_query($query);
	$row = $res->fetch();
	echo $row['Nom'];
	echo '#@%';
	echo $row['Prenom'];
	echo '#@%';
	echo $row['NumTVA'];
	echo '#@%';
	echo $row['Rue'];
	echo '#@%';
	echo $row['Numero'];
	echo '#@%';
	echo $row['Localite'];
	echo '#@%';
	echo $row['CodePostal'];
	echo '#@%';
	echo $row['Pays'];
?>

