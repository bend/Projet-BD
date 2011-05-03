<div id="sub_menu">
	<?php
	require("sub_menu/sub_menu_statistics.php");
include("graph/phpgraphlib.php");
	?>
</div>
<div id="screen_body">
	<fieldset>
		<legend>CA of the last 30 days</legend>
		<div id="warnings">
	<?php
		include("utils/database_connection.php");
		database_connect();
		$query = "SELECT SUM(Prix*Quantite) as somme FROM Vente JOIN Transaction JOIN Composition WHERE Transaction.IdTran=Vente.IdTran AND Transaction.IdTran=Composition.IdTran AND Transaction.Date+0 > CURDATE()-30";
		echo '<fieldset>';
		$res = database_query($query);
		$row = $res->fetch();
		echo 'CA for the last 30 days ';
		echo $row['somme'];
		echo ' EUR';
		echo '</fieldset>';
	?>
		</div>
	</fieldset>
		
</div>
