<?php
	include("../utils/database_connection.php");
	$query = "SELECT * From Identite Where NumTVA in (Select NumTVA From Fournisseur)";
	database_connect();
	$result = database_query($query);
	while($row = $result->fetch()){
		echo $row['Nom'];
		echo ' ';
		echo $row['Prenom'];
		echo '<br/>Vat Num ';
		echo $row['NumTVA'];
		echo '#@%';
		echo $row['Numero'];
		echo ' ';
		echo $row['Rue'];
		echo ' ';
		echo $row['CodePostal'];
		echo' ';
		echo $row['Localite'];
		echo ' ';
		echo $row['Pays'];
		echo '#@%';
	}
?>
