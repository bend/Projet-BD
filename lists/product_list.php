<?php
	$query = " SELECT RefInterne FROM TypeProduit";
	database_connect();
	$res = database_query($query);
	echo '<FORM>';
	echo '<SELECT name="nom" size="1" onChange="javascript:load_product(this.value);">';
	echo '<option selected>-----</option>';
	while($row = $res->fetch()) { 
	 	echo '<option>';	
		echo $row['RefInterne'];
	  	echo '</option>';	
	}
	echo '</SELECT>';
	echo '</FORM>';
	$res->closeCursor();

?>
