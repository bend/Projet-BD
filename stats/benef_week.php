<?php

include("../utils/database_connection.php");
include('../graph/phpgraphlib.php');
include('../graph/phpgraphlib_pie.php');
$year_from = $_GET['year'];
$month_from = $_GET['month'];
$week_from = $_GET['week'];
/*	
$year_from = 2011;
$month_from = 04;
$week_from = 3;
*/
database_connect();

$title = "Profit made on a day of a week (diff between sale price and purchase price)";

try {
	date_default_timezone_set('Europe/Brussels');
    $date = new DateTime();
	$dateEnd = new DateTime();
}catch (Exception $e) {
	echo $e->getMessage();
	exit(1);
}



$day_from = $week_from*7;
$date->setDate($year_from, $month_from, $day_from);
$dateEnd->setDate($year_from, $month_from, ($day_from+1));

for($i=0; $i<7;$i++){
	$queryvente[$i] = "SELECT SUM(Prix*Quantite) FROM Vente JOIN Transaction JOIN Composition WHERE Transaction.IdTran=Vente.IdTran AND Transaction.IdTran=Composition.IdTran AND Transaction.Date+0 >= ".$date->format('Ymd')." + 0 AND Transaction.Date+0 < ".$dateEnd->format('Ymd')." + 0";
	$queryachat[$i] = "SELECT SUM(PrixAchat*Quantite) FROM Vente JOIN Transaction JOIN Composition JOIN TypeProduit WHERE Transaction.IdTran=Vente.IdTran AND Transaction.IdTran=Composition.IdTran AND Composition.RefInterne=TypeProduit.RefInterne AND Transaction.Date+0 >= ".$date->format('Ymd')." + 0 AND Transaction.Date+0 < ".$dateEnd->format('Ymd')." + 0";
	$date->modify("+1 day");
	$dateEnd->modify("+1 day");
}


for($i=0; $i<7;$i++){
	$resultValeurAachat[$i] = database_query($queryachat[$i]);
	$resultvente[$i] = database_query($queryvente[$i]);

	$resultValeurAachat[$i] = $resultValeurAachat[$i]->fetch();
	$resultvente[$i] = $resultvente[$i]->fetch();

	if($resultValeurAachat[$i][0]=="") $resultValeurAachat[$i]=0;
	else $resultValeurAachat[$i]=$resultValeurAachat[$i][0];

	if($resultvente[$i][0]=="") $resultvente[$i]=0;
	else $resultvente[$i]=$resultvente[$i][0];

	$benef[$i]=$resultvente[$i]-$resultValeurAachat[$i];
//echo $benef[$i];
}




$graph = new PHPGraphLib(900,450);
$ydata = array("Mon" => $benef[0], "Tue" => $benef[1], "Wed" => $benef[2], "Thu" => $benef[3], "Fri" => $benef[4], "Sat" => $benef[5], "Sun" => $benef[6]);
$graph->addData($ydata);
$graph->setTitle($title);
$graph->setGradient('red', 'maroon');
$graph->createGraph();
database_close();


?>
