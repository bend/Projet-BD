<?php
include("../utils/database_connection.php");
$cart=$_POST['cart'];
$client=$_POST['client'];
database_connect();

$array = explode("|",$cart); // Get the tuple(product#quantity#repo);

//------------------------------------Lock Tales---------------------------------------------------
	$lock = "LOCK TABLES Transaction WRITE, Composition WRITE, Stock WRITE, Client WRITE, Vente WRITE, TypeProduit READ";
	database_query($lock);

//-------------------------------------------------------------------------------------------------

//------------------------------------Check that the stock is still available-----------------------

	foreach($array as $tuple){
		$t = explode("#",$tuple);
		$product = $t[0];
		$quantity= $t[1];
		$repo = $t[2];
		$query3 = "SELECT * FROM Stock WHERE NomE='$repo' AND RefInterne='$product'";
		$res = database_query($query3);
		$row = $res->fetch();
		if($row['Quantite']<$quantity){
			echo 'The Stock is too low, the transaction cannot be fulfilled';
			$unlock = "UNLOCK TABLES";
			database_query($unlock);
			return;
		}
	}
//-------------------------------------------------------------------------------------------------

//------------------------------------Execute once---------------------------------------------------
$query1 = "INSERT INTO Transaction(NumTVA, Date, Heure) VALUES ('$client', CURDATE(), CURTIME())";
database_edit($query1);

$last_id = database_getlast_inserted_id();

$query2 = "INSERT INTO Vente(IdTran) VALUES('$last_id')"; 
database_edit($query2);
//----------------------------------------------------------------------------------------------------


$tuple = $array[0];

foreach ($array as $tuple){
	$t = explode("#",$tuple);
	$product = $t[0];
	$quantity= $t[1];
	$repo = $t[2];
	$query3 = "INSERT INTO Composition(IdTran, RefInterne, Prix, Quantite) VALUES ('$last_id', '$product', (SELECT PrixVente FROM TypeProduit WHERE RefInterne='$product'),'$quantity')";
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
//-----------------------UNLOCK---------------------------
$unlock = "UNLOCK TABLES";
database_query($unlock);
//--------------------------------------------------------
echo "Transaction added<br/>";
echo 'Id: '.$last_id;
?>
