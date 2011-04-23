<?php
include("../utils/database_connection.php");
$cart=$_POST['cart'];
$supplier=$_POST['supplier'];
$repo=$_POST['repo'];

database_connect();
//------------------------------------Execute once---------------------------------------------------
$query1 = "INSERT INTO STOCK.Transaction(NumTVA, Date, Heure) VALUES ('$supplier', CURDATE(), CURTIME())";
database_edit($query1);

$last_id = database_getlast_inserted_id();

$query2 = "INSERT INTO STOCK.Achat(IdTran) VALUES('$last_id')"; 
database_query($query2);
//----------------------------------------------------------------------------------------------------


$array = explode("|",$cart); // Get the tuple(product,quantity);
$tuple = $array[0];

foreach ($array as $tuple){
	$t = explode("#",$tuple);
	$product = $t[0];
	$quantity= $t[1];
	$query3 = "INSERT INTO STOCK.Composition(IdTran, RefInterne, Prix, Quantite) VALUES ('$last_id', '$product', (SELECT PrixAchat FROM TypeProduit WHERE RefInterne='$product'),'$quantity')";
	database_edit($query3);
}


foreach ($array as $tuple){
	$t = explode("#",$tuple);
	$product = $t[0];
	$quantity= $t[1];
	$query4 = "SELECT * FROM STOCK.Stock WHERE NomE='$repo' and RefInterne='$product'";

	$res = database_query($query4);

	if($res->rowCount()==0){
		$query5 = "INSERT INTO STOCK.Stock(NomE, RefInterne, Quantite) VALUES ('$repo','$product',  0)";
		database_edit($query5);
	}
}
//-----------------------------------------------------------------------

foreach ($array as $tuple){
	$t = explode("#",$tuple);
	$product = $t[0];
	$quantity= $t[1];
	$query6 = "UPDATE Stock SET Quantite=Stock.Quantite+'$quantity' WHERE RefInterne='$product' AND NomE='$repo'";
	database_edit($query6);
}

//TODO ADD BETTER VISUAL
echo "Transaction added";
?>
