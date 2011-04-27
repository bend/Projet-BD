<?php
include("../utils/database_connection.php");
$vatnum = $_GET['vatnum'];
database_connect();

$query = "SELECT * FROM Identite WHERE NumTVA = '$vatnum'";
$query2 = "SELECT * FROM Fournisseur WHERE NumTVA = '$vatnum'";
$res = database_query($query);
$res2 = database_query($query2);
$row = $res->fetch();
$row2 = $res2->fetch();

echo $row['Nom'];
echo '#@%';
echo $row['Prenom'];
echo '#@%';
echo $row['NumTVA'];
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
echo '#@%';
echo $row2['Faillite'];
echo '#@%';
?>

