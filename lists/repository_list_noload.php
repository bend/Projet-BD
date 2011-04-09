<?php
	$query = "SELECT NomE FROM Entrepot";
	database_connect();
	$res = database_query($query);
	echo '<FORM>';
	echo '<SELECT name="repository_list" id="repository_list" size="1">';
	echo '<option>-----</option>';
	while($row = $res->fetch()) { 
	 	echo '<option>';	
		echo $row['NomE'];
		echo '</option>';	
	}
	echo '</SELECT>';
	echo '</FORM>';
	$res->closeCursor();

?>
