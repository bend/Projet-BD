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
$banckrupt=$_POST['banckrupt'];
database_connect();
$query = "UPDATE Identite SET Nom='$name',Prenom='$surname' ,Rue='$roadname', Numero='$roadnum', Localite='$town', CodePostal='$pcode', Pays='$country' WHERE NumTVA='$vatnum'";
$query2 = "UPDATE Fournisseur SET Faillite='$banckrupt'";
database_edit($query);
database_edit($query2);
//TODO ADD BETTER VISUAL
echo "Supplier updated";
?>
