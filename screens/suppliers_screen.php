<div id="sub_menu">
	<?php
		require("sub_menu/sub_menu_suppliers.php");
	?>
</div>
<div id="screen_body">
	<fieldset>
	<legend>Warnings</legend>
	<div id="warnings">
<?php
		include("utils/database_connection.php");
		database_connect();
		$query= "SELECT SUM(Prix*Quantite) as somme ,Fournisseur.NumTVA FROM Fournisseur NATURAL JOIN Transaction NATURAL JOIN Composition 
			WHERE Fournisseur.NumTVA=Transaction.NumTVA AND Faillite=1 AND Transaction.IdTran=Composition.IdTran AND (SELECT SUM(Prix*Quantite))> 100 GROUP BY NumTVA";
		$res = database_query($query);
		while($row = $res->fetch()){
			echo '<div class="warning"> These Suppliers are Banckrupted</div>';
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
?>
</div>
</fieldset>
</div>
