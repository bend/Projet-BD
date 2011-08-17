
<div id="sub_menu">
	<?php
	require("sub_menu/sub_menu_clients.php");
	?>
</div>
<div id="screen_body">
	<fieldset>
		<legend>Best Customers of the last 30 days (TOP 5)</legend>
		<div id="warnings">
			<?php
			include("utils/database_connection.php");
			database_connect();
			$query ="SELECT NumTVA, SUM(Prix*Quantite) AS somme ,Transaction.idTran FROM Transaction NATURAL JOIN Composition GROUP BY
			Transaction.NumTVA And Date<CURDATE()-100 ORDER BY (Sum(Prix*Quantite)) DESC LIMIT 5";
			$res = database_query($query);
			while($row = $res->fetch()){
			$id = $row['NumTVA'];
			$query2 = "SELECT * FROM Identite WHERE NumTVA='$id'";
			database_connect();
			$res2 = database_query($query2);
			$row2 = $res2->fetch();
			echo '<fieldset>';
				echo '<a id="zoom_img" href="loads/identity_preview.php?id=';
					echo $row['NumTVA'];
					echo '"/>VAT Number:	';
					echo $row2['NumTVA'];
					echo '</a><br/>Name:	';
				echo $row2['Nom'];
				echo ' ';
				echo $row2['Prenom'];
				echo '<br/>Total purchase amount: ';
				echo $row['somme'];
				echo '</fieldset>';
			}
			database_close();
			?>
		</div>
	</fieldset>
</div>
