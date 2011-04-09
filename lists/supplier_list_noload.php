<?php
	$query = " SELECT NumTVA FROM Fournisseur";
	database_connect();
	$res = database_query($query);
	echo '<FORM>';
	echo '<SELECT name="supplier_list" id="supplier_list"  size="1" >';
	echo '<option selected>-----</option>';
	while($row = $res->fetch()) { 
	 	echo '<option>';	
		echo $row['NumTVA'];
		echo '</option>';	
	}
	echo '</SELECT>';
	echo '</FORM>';
	$res->closeCursor();
?>
