<?php
$query = "SELECT NomE FROM Entrepot";
database_connect();
$res = database_query($query);
echo '<FORM>';
	echo '<SELECT name="nom" size="1" onChange="javascript:load_repository(this.value);">';
		echo '<option>-----</option>';
		while($row = $res->fetch()) { 
		echo '<option>';	
		echo $row['NomE'];
		echo '</option>';	
		}
		echo '</SELECT>';
	echo '</FORM>';
$res->closeCursor();
database_close();
?>
