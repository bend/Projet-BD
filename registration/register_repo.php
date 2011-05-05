<?php
include("../utils/database_connection.php");
$name=$_POST['name'];
$roadname=$_POST['roadname'];
$roadnum=$_POST['roadnum'];
$pcode=$_POST['code'];
$town=$_POST['town'];
$country=$_POST['country'];

database_connect();
$query = "INSERT INTO Entrepot(NomE, Rue, Numero, Localite, CodePostal, Pays) VALUES('$name' ,'$roadname', '$roadnum', '$town', '$pcode', '$country')";
database_edit($query);
database_close();
//TODO ADD BETTER VISUAL
echo "Repository added";
?>
