<div id="sub_menu">
	<?php
		require("sub_menu_search_all.php");
	?>
</div>
<div id="screen_body">
	<?php
		$searched_data = $_REQUEST['search'];
		echo 'voila la valeur '.$searched_data;
	?>
</div>
