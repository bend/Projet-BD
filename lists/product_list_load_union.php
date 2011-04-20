<?php
	$query = " SELECT RefInterne FROM TypeProduit";
	database_connect();
	$res = database_query($query);
	echo '<FORM>';
	echo '<SELECT name="product_list" id="product_list" size="1" onChange="javascript:list_union_repo(this.value);enable_fancy();">';
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
