<?php
	$query = " SELECT NumTVA FROM Fournisseur";
	database_connect();
	$res = database_query($query);
	echo '<FORM>';
	echo '<SELECT name="nom" size="1" onChange="javascript:load_supplier(this.value);">';
	echo '<option selected>-----</option>';
	while($row = $res->fetch()) { 
	 	echo '<option>';	
		echo $row['NumTVA'];
		echo '</option>';	
	}
	echo '</SELECT>';
	echo '</FORM>';
	$res->closeCursor();
	database_close();
?>
