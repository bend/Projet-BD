<fieldset>
	<legend>View Stocks in repositories</legend>
	<fieldset>
		<legend>Select a Product</legend>
		<?php
			include("../utils/database_connection.php");
			include("../lists/product_list_onclick_1.php");
		?>
	</fieldset>
	<fieldset>
		<legend>This Product is  available in these repositories</legend>
		<div id="table-stock">Please select a Product</div>
	</fieldset>
<span id="loading"></span>
</fieldset>
