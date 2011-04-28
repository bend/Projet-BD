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
$active = $_POST['active'];

database_connect();
$query = "UPDATE TypeProduit SET  Marque='$brand', Denomination='$denom', Description='$description', Contenance='$contenance', CodeBarre='$barcode', PrixVente='$sellprice', PrixAchat='$buyprice', TVA='$vatrate', Img='$imgpath' , Actif='$active' WHERE RefInterne='$ref'";
database_edit($query);
//TODO ADD BETTER VISUAL
echo "Product updated";
?>
