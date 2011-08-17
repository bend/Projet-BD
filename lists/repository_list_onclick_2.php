<?php
$query = "SELECT NomE FROM Entrepot";
database_connect();
$res = database_query($query);
echo '<FORM>';
	echo '<SELECT name="repository_list" id="repository_list1" onchange="javascript:load_stock_in_repo();">';
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
