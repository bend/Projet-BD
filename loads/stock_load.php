<?php
include("../utils/database_connection.php");
$repo = $_POST['repo'];
database_connect();

$query = "SELECT * FROM Stock WHERE NomE='$repo'";
$res = database_query($query);
echo '<table border="1">';
	echo '
	<tr>
		<td>Product Internal Ref</td>
		<td>Stock Quantity</td>
	</tr>';
	while($row = $res->fetch()){
	echo '<tr>';
		echo '<td>';
			echo '<a id="load_pro" href="loads/product_preview.php?ref=';
				echo $row['RefInterne'];
				echo '">';
				echo $row['RefInterne'];
				echo '</a>';
			echo '</td>
		<td>';
			echo $row['Quantite'];
			echo '
		</td>';
	}
echo '</table>';
?>

