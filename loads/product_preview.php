<?php
include("../utils/database_connection.php");
$ref = $_GET['ref'];
database_connect();

$query = "SELECT * FROM TypeProduit  WHERE RefInterne = '$ref'";
$res = database_query($query);
$row = $res->fetch();
echo '<div id="prod_detail">';
	echo '<fieldset><legend>Product details</legend>';
		echo 'Internal Reference: ';
		echo $row['RefInterne'];
		echo '<br/>Brand: ';
		echo $row['Marque'];
		echo '<br/>Denomination: ';
		echo $row['Denomination'];
		echo '<br/>Description: ';
		echo $row['Description'];
		echo '<br/>Contenance: ';
		echo $row['Contenance'];
		echo '<br/>BarCode: ';
		echo $row['CodeBarre'];
		echo '<br/>Buying price: ';
		echo $row['PrixAchat'];
		echo '<br/>Selling Vente: ';
		echo $row['PrixVente'];
		echo '<br/>VAT Rate:';
		echo $row['TVA'];
		echo '<br/><img src="';
		echo $row['Img'];
		echo '" width="150" onerror="javascript:this.src=\'img/empty.png\';this.height=0; this.width=0;"/>';
		echo '</fieldset></div>';
		database_close();
?>
