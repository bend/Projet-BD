<fieldset>
	<legend>Move Stock from repositories</legend>
	<fieldset>
		<legend>From</legend>
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
