<fieldset>
	<legend>Move Stock from repositories</legend>
	<fieldset>
		<legend>From</legend>
		<?php
		include("../utils/database_connection.php");
		include("../lists/repository_list_onclick_1.php");
		?>
	</fieldset>
	<fieldset>
		<legend>To</legend>
		<?php
		include("../lists/repository_list_noload.php");
		?>
	</fieldset>
	<fieldset>
		<legend>Select a product</legend>
		<span id="prodo"><select id=product_list><option>-----</option></select></span>
	</fieldset>
	<fieldset>
		<legend>Select a Quantity</legend>
		<span id="quantity"><select id=quantity_list><option>-----</option></select></span>
	</fieldset>
	<input type="button" value="Transfert Stock" onclick="javascript:transfert_stock(repository_list1.value, repository_list.value, product_list.value, quantity_list.value);" />
	<span id="loading"></span>
</fieldset>
