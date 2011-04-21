
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
		include("utils/database_connection.php");
		database_connect();
		$query = "SELECT Client.NumTVA, Identite.Nom, Identite.Prenom, SUM(Prix*Quantite) as somme FROM Client JOIN Identite JOIN Transaction JOIN Composition 
			WHERE Client.NumTVA=Transaction.NumTVA AND Transaction.IdTran=Composition.IdTran 
			AND Transaction.Date+0 > CURDATE() -30 AND (SELECT SUM(Prix*Quantite) > 1000)";
		$res = database_query($query);
			while($row = $res->fetch()){
				echo '<fieldset>';
				echo 'VAT Number:	';
				echo $row['NumTVA'];
				echo '<br/>Name:	';
				echo $row['Nom'];
				echo ' ';
				echo $row['Prenom'];
				echo '<br/>Purchase amout:   ';
				echo $row['somme'];
				echo ' EUR';
				echo '</fieldset>';
			}
?>
</div>
</fieldset>
</div>
