<div id="sub_menu">
	<?php
	require("sub_menu/sub_menu_default.php");
	?>
</div>
<div id="screen_body">
	<div id="warnings">
		<fieldset>
			<legend>Welcome</legend>
			<fieldset>
				<legend>Last Transactions</legend>
				<?php
					include("utils/database_connection.php");
					$query = "SELECT * FROM Transaction WHERE IdTran IN (Select idTran from Achat ) ORDER BY IdTran DESC LIMIT 3";
					database_connect();
					$res = database_query($query);
					echo '<fieldset>
						<legend>Last Purchases</legend>';
						while($row = $res->fetch()){
							$id = $row['IdTran'];
							$total = "SELECT Sum(Prix*Quantite) AS somme FROM Composition WHERE IdTran='$id'";
							$res2 = database_query($total);
							$row2 = $res2->fetch();
							echo '<fieldset>';
								echo '<a id="zoom_img" href="loads/identity_preview.php?id=';
									echo $row['NumTVA'];
									echo '"/>VAT Number:	';
									echo $row['NumTVA'];
									echo '</a><br/>Date: ';
								echo $row['Date'];
								echo ' ';
								echo $row['Heure'];
								echo '<br/>Total: ';
								echo $row2['somme'];
								echo ' EUR';
							echo '</fieldset>';
						}
					echo '</fieldset>';
					echo '<fieldset>
						<legend>Last Sales</legend>';
						$query = "SELECT * FROM Transaction WHERE IdTran IN (Select idTran from Vente ) ORDER BY IdTran DESC LIMIT 3";
						$res = database_query($query);
						while($row = $res->fetch()){
							$id = $row['IdTran'];
							$total = "SELECT Sum(Prix*Quantite) as somme FROM Composition WHERE IdTran='$id'";
							$res2 = database_query($total);
							$row2 = $res2->fetch();
							echo '<fieldset>';
								echo '<a id="zoom_img" href="loads/identity_preview.php?id=';
									echo $row['NumTVA'];
									echo '"/>VAT Number:	';
									echo $row['NumTVA'];
									echo '</a><br/>Date: ';
								echo $row['Date'];
								echo ' ';
								echo $row['Heure'];
								echo '<br/>Total: ';
								echo $row2['somme'];
								echo ' EUR';
							echo '</fieldset>';
						}
					echo '</fieldset>';
				database_close();
				?>

			</fieldset>
		</fieldset>
	</div>
</div>
