<?php
	include("../utils/database_connection.php");
	$query = " SELECT NumTVA FROM Client";
	database_connect();
	$res = database_query($query);
	echo '<FORM>';
	echo '<SELECT name="nom" size="1" onChange="javascript:load_client(this.value);">';
	echo '<option>-----</option>';
	while($row = $res->fetch()) { 
	 	echo '<option>';	
		echo $row['NumTVA'];
	 	echo '</option>';	
	}
	echo '</SELECT>';
	echo '</FORM>';
	$res->closeCursor();

?>
