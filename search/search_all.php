<?php
include("../utils/database_connection.php");

$searched_data = $_REQUEST['search'];
$query_1 = "SELECT * FROM TypeProduit WHERE RefInterne like '$searched_data' OR  Marque like '%$searched_data%' OR Denomination like '%$searched_data%' OR  Description like '%$searched_data%'";
database_connect();
$res1 = database_query($query_1);
while($row = $res1->fetch()) {
	echo '<div id="product_search">';
		echo '<a id="zoom_img" href="';
			echo $row['Img'];
			echo '">';
			echo '<img alt="click" width="100" onerror="javascript:this.src=\'img/empty.png\';"  src="';
			echo $row['Img'];
			echo'"/>';
			echo'</a>';
		echo '<a href="javascript:;" onclick="javascript:load_pro(';
			echo $row['RefInterne'];
			echo ');" >';
			echo 'Ref: ';
			echo $row['RefInterne'];
			echo '<br/>';
			echo 'Brand: ';
			echo $row['Marque'];
			echo '<br/>';
			echo 'Denomination: ';
			echo $row['Denomination'];
			echo '</a>';
		echo '<br/>';
		echo '</div>';
}
database_close();
?>
