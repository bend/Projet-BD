<?php
	include("../utils/database_connection.php");
	$val = $_POST['val'];
	$query = "SELECT Transaction.IdTran as IdTran, Date, Heure From Transaction JOIN Composition WHERE Transaction.IdTran LIKE '$val' OR NumTVA LIKE '$val%' OR RefInterne LIKE '$val%' OR Date LIKE '%$val%' OR RefInterne in (SELECT RefInterne FROM TypeProduit WHERE Marque LIKE '%$val%' OR Denomination LIKE '%$val%') GROUP BY Transaction.IdTran";
	database_connect();
	$res = database_query($query);
	if($res->rowCount()==0)
		echo 'No Results Found';
	while($temp = $res->fetch()){
		echo '<a id="test" href="loads/transaction_load.php?val=';
		echo $temp['IdTran'];
		echo 'onclick="javascript:load_transaction(';

		echo $temp['IdTran'];
		echo ');">';
		echo 'ID: ';
		echo $temp['IdTran'];
		echo '	Date: ';
		echo $temp['Date'];
		echo '	Hour: ';
		echo $temp['Heure'];
		echo "</a>";
		echo "<br/>";
	}
	$res->closeCursor();
	database_close();
?>
