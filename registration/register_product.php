<?php
include("../utils/database_connection.php");
$ref=$_POST['ref'];
$brand = $_POST['brand'];
$denom=$_POST['denom'];
$description =$_POST['description'];
$contenance=$_POST['contenance'];
$barcode=$_POST['barcode'];
$sellprice=$_POST['sellprice'];
$buyprice=$_POST['buyprice'];
$vatrate=$_POST['vatrate'];
$imgpath = $_POST['imgpath'];

database_connect();
$query = "INSERT INTO TypeProduit(RefInterne, Marque,Denomination, Description, Contenance, CodeBarre, PrixVente, PrixAchat, TVA, Img, Actif) VALUES 
('$ref','$brand', '$denom', '$description', '$contenance', '$barcode', '$sellprice', '$buyprice', '$vatrate', '$imgpath', TRUE)";

database_edit($query);
//TODO ADD BETTER VISUAL
echo "Product added";
?>
