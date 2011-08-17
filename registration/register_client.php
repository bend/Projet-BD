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

database_connect();
$check = "SELECT * FROM Identite WHERE NumVAT='$vatnum'";

$res=database_query($check);

if($res==0){
$query = "INSERT INTO Identite(NumTVA,Nom,Prenom,DateAjout, Rue, Numero, Localite, CodePostal, Pays) VALUES('$vatnum','$name','$surname',CURDATE(), '$roadname', '$roadnum', '$town', '$pcode', '$country')";
database_edit($query);
}
$query2 = "INSERT INTO Client(NumTVA) VALUES('$vatnum')";
database_edit($query2);
database_close();
//TODO ADD BETTER VISUAL
echo "Client added";
?>
