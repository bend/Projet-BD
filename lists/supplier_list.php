<?php
	include("../utils/database_connection.php");
	$query = " SELECT NumTVA FROM Fournisseur";
	database_connect();
	$res = database_query($query);
	echo '<FORM>';
	echo '<SELECT name="nom" size="1" onChange="javascript:load_client(this.value);">';
	echo '<OPTION>-----';
	while($row = $res->fetch()) { 
	 	echo '<OPTION>';	
		echo $row['NumTVA'];    
	}
	echo '</SELECT>';
	echo '</FORM>';
	$res->closeCursor();

?>
