<fieldset>
	<legend>View Stocks in repositories</legend>
	<fieldset>
		<legend>Select Repository</legend>
		<?php
		include("../utils/database_connection.php");
		include("../lists/repository_list_onclick_2.php");
		?>
	</fieldset>
	<fieldset>
		<legend>Stock available in this repository</legend>
		<div id="table-stock">Please select a repository</div>
	</fieldset>
	<span id="loading"></span>
</fieldset>
