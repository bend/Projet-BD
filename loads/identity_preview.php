<?php
	include("../utils/database_connection.php");
	$id = $_GET['id'];
	database_connect();

	$query = "SELECT * FROM Identite  WHERE NumTVA = '$id'";
	$res = database_query($query);
	$row = $res->fetch();
	echo '<div id="prod_detail">';
	echo '<fieldset><legend>Identity details</legend>';
	echo 'VAT Num: ';
	echo $row['NumTVA'];
	echo '<br/>Name: ';
	echo $row['Prenom'];
	echo ' ';
	echo $row['Nom'];
	echo '<br/>Adresse: <blockquote>';
	echo $row['Numero'];
	echo ' ';
	echo $row['Rue'];
	echo '<br/> ';
	echo $row['CodePostal'];
	echo ' ';
	echo $row['Ville'];
	echo '<br/>';
	echo $row['Pays'];
	echo '</blockquote>';
	echo '</fieldset></div>';
	database_close();
?>
