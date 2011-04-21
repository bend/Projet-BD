<legend>Results in Suppliers</legend>
<?php
		include("../utils/database_connection.php");

		$searched_data = $_REQUEST['search'];
		$query_1 = "SELECT * FROM Identite WHERE (Nom like '%$searched_data%' OR Prenom like '%$searched_data%') AND NumTVA in (Select NumTVA from Fournisseur)";
		database_connect();
		$res1 = database_query($query_1);
		while($row = $res1->fetch()) {
			echo '<div id="identite-search">';
			echo '<a href="javascript:;" onclick="javascript:load_sup(\'';
			echo $row['NumTVA'];
			echo '\');">VATNum: ';
			echo $row['NumTVA'];
			echo '</a><br/>Name: ';
			echo $row['Prenom'];
			echo ' ';
			echo $row['Nom'];
			echo '</div>';
		}

		

	?>
