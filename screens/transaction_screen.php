<div id="sub_menu">
	<?php
	require("sub_menu/sub_menu_transaction.php");
	?>
</div>
<div id="screen_body">
	<fieldset>

		<legend>Biggest Sale during last 30 days(TOP5)</legend>
		<div id="warnings">
			<?php
			include("utils/database_connection.php");
			database_connect();
			$query = "SELECT RefInterne, Prix, Quantite FROM Vente JOIN Transaction JOIN Composition WHERE Transaction.IdTran=Vente.IdTran AND Transaction.IdTran=Composition.IdTran AND Transaction.Date+0 > CURDATE()-30 
			ORDER BY Prix*Quantite DESC 
			LIMIT 5";
			$res = database_query($query);
			while($row=$res->fetch()){
			echo '<fieldset>';
				echo '<a id="zoom_img" href="loads/product_preview.php?ref=';
					echo $row['RefInterne'];
					echo '">Product Ref: ';
					echo $row['RefInterne'];
					echo '</a><br/>Quantity sold: ';
				echo $row['Quantite'];
				echo '<br/>Total amount: ';
				echo $row['Prix']*$row['Quantite'];
				echo ' EUR</fieldset>';
			}
			$res->closeCursor();
			database_close();
			?>
		</div>
	</fieldset>
</div>
