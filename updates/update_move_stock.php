<?php
include("../utils/database_connection.php");
$from=$_POST['from'];
$to = $_POST['to'];
$prod=$_POST['prod'];
$quantity =$_POST['quantity'];

database_connect();
$query = "UPDATE Stock SET Quantite=Stock.Quantite-'$quantity' WHERE  RefInterne='$prod'  AND NomE='$from'";
$query2 = "SELECT * from Stock Where NomE='$to' and RefInterne='$prod'";

database_edit($query);
$check = database_query($query2);
if($check->rowCount()==0){
$query3 = "INSERT INTO STOCK.Stock(NomE, RefInterne, Quantite) VALUES ('$to', '$prod' , 0)";
database_edit($query3);
}
$query4 = "UPDATE Stock SET Quantite=Stock.Quantite+'$quantity' WHERE RefInterne='$prod' AND NomE='$to'";
database_edit($query4);
//TODO ADD BETTER VISUAL
echo "Stock Transfered";
?>
