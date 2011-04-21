
<div id="sub_menu">
	<?php
		require("sub_menu/sub_menu_repositories.php");
	?>
</div>
<div id="screen_body">
	<fieldset>
		<legend>Warnings</legend>
		<?php
			include("utils/database_connection.php");
			database_connect();
			$query = "SELECT * FROM Stock WHERE Quantite<3";
			$res = database_query($query);
			if($res->rowCount()>0){
			echo '<div id="warnings"><div class="warning">Stocks are getting low in:</div> ';	
				while($row=$res->fetch()){
					echo '<fieldset>Repository: ';
					echo $row['NomE'];
					echo '<br/><a id="zoom_img" href="loads/product_preview.php?ref=';
					echo $row['RefInterne'];
					echo '">  Product Ref: ';
					echo $row['RefInterne'];
					echo '</a><br>Quantity: ';
					echo $row['Quantite'];
					echo '</fieldset>';
				}
				$res->closeCursor();
			}

?>
</div>
	</fieldset>

</div>

