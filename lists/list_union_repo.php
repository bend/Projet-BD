<?php
include("../utils/database_connection.php");
$prod_id = $_POST['product'];
$query = "SELECT NomE FROM Stock WHERE RefInterne='$prod_id' AND Quantite>0";
database_connect();
$res = database_query($query);
echo '<FORM>';
	echo '<SELECT name="repo_list" id="repo_list"  size="1" onChange="javascript:list_union_quantity(this.value);">';
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
