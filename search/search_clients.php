<legend>Results in Clients</legend>
<?php
		include("../utils/database_connection.php");

		$searched_data = $_REQUEST['search'];
		$query_1 = "SELECT * FROM Identite WHERE (Nom like '%$searched_data%' OR Prenom like '%$searched_data%') AND NumTVA in (Select NumTVA from Client)";
		database_connect();
		$res1 = database_query($query_1);
		if($res1->rowCount()>0){
			while($row = $res1->fetch()) {
				echo '<div id="identite-search">';
				echo '<a href="javascript:;" onclick="javascript:load_cli(\'';
				echo $row['NumTVA'];
				echo '\');">VATNum: ';
				echo $row['NumTVA'];
				echo '</a><br/>Name: ';
				echo $row['Prenom'];
				echo ' ';
				echo $row['Nom'];
				echo '</div>';
			}
		}else echo 'No Results';
		

	?>
