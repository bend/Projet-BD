<?php
	include("../utils/database_connection.php");
	$query = " SELECT NumTVA FROM Client";
	database_connect();
	$res = database_query($query);
	echo '<FORM>';
	echo '<SELECT name="nom" size="1"">';
	while($row = $res->fetch()) { 
	 	echo '<OPTION>';	
		echo $row['NumTVA'];    
	}
	echo '</SELECT>';
	echo '</FORM>';
	$res->closeCursor();

?>
