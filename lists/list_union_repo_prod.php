<?php
include("../utils/database_connection.php");
$repo_name = $_POST['repo'];
$query = "SELECT RefInterne FROM Stock WHERE NomE='$repo_name' AND Quantite>0";
database_connect();
$res = database_query($query);
echo '<FORM>';
	echo '<SELECT name="product_list" id="product_list"  size="1" onChange="javascript:list_union_quantity(repository_list1.value);">';
		echo '<option>-----</option>';
		while($row = $res->fetch()) { 
		echo '<option>';	
		echo $row['RefInterne'];
		echo '</option>';	
		}
	echo '</SELECT>';
echo '</FORM>';
$res->closeCursor();

?>
