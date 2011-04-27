<?php
include("../utils/database_connection.php");
$prod_id = $_POST['product'];
$repo = $_POST['repo'];
$query = "SELECT Quantite FROM Stock WHERE NomE='$repo' and RefInterne='$prod_id'";
database_connect();
$res = database_query($query);
echo '<FORM>';
	echo '<SELECT name="quantity_list" id="quantity_list"  size="1" >';
		echo '<option>-----</option>';
		$temp = $res->fetch();
		$nb = $temp['Quantite'];
		for($i=1;$i<$nb+1;$i++){
		echo '<option>';	
		echo $i;
		echo '</option>';	
		}
		echo '</SELECT>';
	echo '</FORM>';
$res->closeCursor();
?>
