<?php
include("../utils/database_connection.php");
$ref = $_GET['ref'];
database_connect();

$query = "SELECT * FROM TypeProduit  WHERE RefInterne = '$ref'";
$res = database_query($query);
$row = $res->fetch();

echo $row['RefInterne'];
echo '#@%';
echo $row['Marque'];
echo '#@%';
echo $row['Denomination'];
echo '#@%';
echo $row['Description'];
echo '#@%';
echo $row['Contenance'];
echo '#@%';
echo $row['CodeBarre'];
echo '#@%';
echo $row['PrixVente'];
echo '#@%';
echo $row['PrixAchat'];
echo '#@%';
echo $row['TVA'];
echo '#@%';
echo $row['Img'];
echo '#@%';
echo $row['Actif'];
?>

