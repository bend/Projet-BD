<?php
$query = " SELECT NumTVA FROM Client WHERE DateDernierAchat>CURDATE()-365 ORDER BY NumTVA";
database_connect();
$res = database_query($query);
echo '<FORM>';
	echo '<SELECT name="nom" id="client_list" size="1" onChange="javascript:load_client(this.value);">';
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
