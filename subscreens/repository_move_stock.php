<fieldset>
	<legend>Move Stock from repositories</legend>
	<fieldset>
		<legend>From</legend>
		<?php
			include("../utils/database_connection.php");
			include("../lists/repository_list_noload.php");
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
		<span id="prodo"><select id=prod_list><option>-----</option></select></span>
	</fieldset>
	<fieldset>
		<legend>Select a Quantityt</legend>
		<span id="quantity"><select id=quantity_list><option>-----</option></select></span>
	</fieldset>
	<input type="button" value="Transfert Stock" />
</fieldset>
