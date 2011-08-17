<?php
$query = " SELECT RefInterne FROM TypeProduit ORDER BY RefInterne";
database_connect();
$res = database_query($query);
echo '<FORM>';
	echo '<SELECT name="product_list" onchange="javascript:enable_fancy();" id="product_list" size="1">';
		echo '<option selected>-----</option>';
		while($row = $res->fetch()) { 
		echo '<option>';	
		echo $row['RefInterne'];
		echo '</option>';	
		}
		echo '</SELECT>';
	echo '</FORM>';
$res->closeCursor();
database_close();
?>
