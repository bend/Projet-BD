<?php
	include("../utils/database_connection.php");
	$query = " SELECT RefInterne FROM TypeProduit";
	database_connect();
	$res = database_query($query);
	echo '<FORM>';
	echo '<SELECT name="nom" size="1" onChange="javascript:load_product(this.value);">';
	echo '<OPTION>-----';
	while($row = $res->fetch()) { 
	 	echo '<OPTION>';	
		echo $row['RefInterne'];    
	}
	echo '</SELECT>';
	echo '</FORM>';
	$res->closeCursor();

?>
