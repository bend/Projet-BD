<?php
	include("../utils/database_connection.php");
	$cart=$_POST['cart'];
	$client=$_POST['client'];
	database_connect();
	//------------------------------------Execute once---------------------------------------------------
	$query1 = "INSERT INTO STOCK.Transaction(NumTVA, Date, Heure) VALUES ('$client', CURDATE(), CURTIME())";
	database_edit($query1);
	
	$last_id = database_getlast_inserted_id();
	
	$query2 = "INSERT INTO STOCK.Vente(IdTran) VALUES('$last_id')"; 
	database_query($query2);
	//----------------------------------------------------------------------------------------------------

	
	$array = explode("|",$cart); // Get the tuple(product,quantity,repo);
	$tuple = $array[0];
	
	foreach ($array as $tuple){
		$t = explode("#",$tuple);
		$product = $t[0];
		$quantity= $t[1];
		$repo = $t[2];
		$query3 = "INSERT INTO STOCK.Composition(IdTran, RefInterne, Prix, Quantite) VALUES ('$last_id', '$product', (SELECT PrixVente FROM TypeProduit WHERE RefInterne='$product'),'$quantity')";
		database_edit($query3);
	}

	
	
	foreach ($array as $tuple){
		$t = explode("#",$tuple);
		$product = $t[0];
		$quantity= $t[1];
		$repo=$t[2];
		$query6 = "UPDATE Stock SET Quantite=Stock.Quantite-'$quantity' WHERE RefInterne='$product' AND NomE='$repo'";
		database_edit($query6);
	}

	$query7 = "UPDATE Client SET DateDernierAchat=CURDATE() WHERE NumTVA='$client'";
	database_edit($query7);
	
	//TODO ADD BETTER VISUAL
	echo "Transaction added";
?>
