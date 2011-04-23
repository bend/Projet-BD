<?php
$query = " SELECT NumTVA FROM Client";
database_connect();
$res = database_query($query);
echo '<FORM>';
	echo '<SELECT name="client_list" id="client_list" size="1" ">';
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
