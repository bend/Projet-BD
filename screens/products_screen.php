<div id="sub_menu">
	<?php
	require("sub_menu/sub_menu_products.php");
	?>
</div>
<div id="screen_body">
	<fieldset>
		<legend>Products Best Seller during last 30 days(TOP 5)</legend>
		<div id="warnings">
			<?php
			include("utils/database_connection.php");
			database_connect();
			$query = "SELECT RefInterne, Sum(Prix*Quantite) as somme, Sum(Quantite) as quantite FROM Vente JOIN Transaction JOIN Composition 
			WHERE Transaction.IdTran=Vente.IdTran AND Transaction.IdTran=Composition.IdTran AND Transaction.Date+0 > CURDATE()-30 
			GROUP BY RefInterne
			ORDER BY  Sum(Quantite) DESC 
			LIMIT 5";
			$res = database_query($query);
			while($row=$res->fetch()){
			echo '<fieldset>';
				echo '<a id="zoom_img" href="loads/product_preview.php?ref=';
					echo $row['RefInterne'];
					echo '">Product Ref: ';
					echo $row['RefInterne'];
					echo '</a><br/>Quantity sold: ';
				echo $row['quantite'];
				echo '<br/>Total amount: ';
				echo $row['somme'];
				echo ' EUR</fieldset>';
			}
			$res->closeCursor();
			?>
		</div>
	</fieldset>
</div>
