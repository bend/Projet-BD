<?php
include("../utils/database_connection.php");
$val = $_GET['val'];
database_connect();
$query = "SELECT * FROM Transaction WHERE IdTran='$val'";
$query2 = "SELECT * FROM Composition WHERE IdTran='$val'";
$query3 = "SELECT SUM(Prix*Quantite) AS total FROM Composition WHERE IdTran='$val'";
$res = database_query($query);
$res2 = database_query($query2);
$res3 = database_query($query3);


$row = $res->fetch();
$total = $res3->fetch();

echo '<div id="result_load">';
	echo '<fieldset><legend>Transaction Details</legend>';
		echo "Transaction ID: ";
		echo $row['IdTran'];

		//CHECK IF ITS A CLIENT OR A SUPPLIER
		$idTran = $row['IdTran'];
		//check if its a client
		$check = "SELECT * FROM Achat WHERE IdTran='$idTran'";

		$bool = database_query($check);
		echo '<br/>Type: ';
		if($bool->rowCount()==0){
		echo 'Sale';
		}else echo 'Purchase';

		echo '<br/>VAT Number: ';
		echo $row['NumTVA'];
		echo '<br/>Date: ';
		echo $row['Date'];
		echo '<br/>Hour: ';
		echo $row['Heure'];
		echo '<br/>Total: ';
		echo $total['total'];
		echo ' EUR</fieldset>';
	$i=1;
	echo '<fieldset><legend>Articles Details</legend>';
		while($row= $res2->fetch()){
		echo "<fieldset><legend>Article $i</legend>";
			$ref = $row['RefInterne'];
			echo "<a href=\"javascript:;\" onclick=\"javascript:load_pro('$ref');\"> Internal Ref: ";
				echo $ref;
				echo '</a><br/>Price: ';
			echo $row['Prix'];
			echo ' EUR<br/>Quantity: ';
			echo $row['Quantite'];
			$i++;	
			echo '</fieldset>';
		}
		echo '</fieldset>';
	echo '</div>';
database_close();
?>

