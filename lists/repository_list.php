<?php
	include("../utils/database_connection.php");
	$query = "SELECT Nom FROM Entrepot";
	database_connect();
	$res = database_query($query);
	echo '<FORM>';
	echo '<SELECT name="nom" size="1" onChange="javascript:load_repository(this.value);">';
	echo '<OPTION>-----';
	while($row = $res->fetch()) { 
	 	echo '<OPTION>';	
		echo $row['Nom'];    
	}
	echo '</SELECT>';
	echo '</FORM>';
	$res->closeCursor();

?>
