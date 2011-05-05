<div id="sub_menu">
	<?php
	require("sub_menu/sub_menu_search_all.php");
	?>
</div>
<div id="screen_body">
	<legend>Results in Products</legend>
	<?php
	include("utils/database_connection.php");

	$searched_data = $_POST['search'];
	$query_1 = "SELECT * FROM TypeProduit WHERE RefInterne like '$searched_data' OR  Marque like '%$searched_data%' OR Denomination like '%$searched_data%' OR  Description like '%$searched_data%'";
	database_connect();
	$res1 = database_query($query_1);
	if($res1->rowCount()>0){
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
	}else echo'<br/>No Results';
	database_close();
	?>
</div>
