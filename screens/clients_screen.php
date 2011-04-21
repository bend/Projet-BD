
<div id="sub_menu">
	<?php
		require("sub_menu/sub_menu_clients.php");
	?>
</div>
<div id="screen_body">
	<fieldset>
	<legend>Best Customer of the last 30 days (Purchase Amout>1000 EUR)</legend>
	<div id="warnings">
<?php
		//TODO ADD PURCHASE AMOUNT
		include("utils/database_connection.php");
		database_connect();
		$query = "SELECT Client.NumTVA FROM Client JOIN Transaction JOIN Composition 
			WHERE Client.NumTVA=Transaction.NumTVA AND Transaction.IdTran=Composition.IdTran 
			AND Transaction.Date+0 > CURDATE() -30 AND (SELECT SUM(Prix*Quantite) > 1000)";
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
			echo '</fieldset>';
		}
?>
</div>
</fieldset>
</div>
