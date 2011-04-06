<?php
	include("../utils/database_connection.php");
	$name = $_GET['name'];
	database_connect();

	$query = "SELECT * from Entrepot  where Nom = '$name'";
	$res = database_query($query);
	$row = $res->fetch();
	echo $row['Nom'];
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

