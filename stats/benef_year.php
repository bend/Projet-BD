<?php

include("../utils/database_connection.php");
include('../graph/phpgraphlib.php');
include('../graph/phpgraphlib_pie.php');

$year_from = $_GET['year'];
$month_from = 01;
$day_from = 01;

database_connect();

$title = "Profits earned per month over a year (diff betwwen selling price of sales of the month and the purchase price)";
try {
	date_default_timezone_set('Europe/Brussels');
    $date = new DateTime();
	$dateEnd = new DateTime();
}catch (Exception $e) {
	echo $e->getMessage();
	exit(1);
}
$date->setDate($year_from, $month_from, $day_from);
$dateEnd->setDate($year_from, $month_from+1, $day_from);

for($i=0; $i<12;$i++){
	$queryvente[$i] = "SELECT SUM(Prix*Quantite) FROM Vente JOIN Transaction JOIN Composition WHERE Transaction.IdTran=Vente.IdTran AND Transaction.IdTran=Composition.IdTran AND Transaction.Date+0 >= ".$date->format('Ymd')." + 0 AND Transaction.Date+0 < ".$dateEnd->format('Ymd')." + 0";
	$queryachat[$i] = "SELECT SUM(PrixAchat*Quantite) FROM Vente JOIN Transaction JOIN Composition JOIN TypeProduit WHERE Transaction.IdTran=Vente.IdTran AND Transaction.IdTran=Composition.IdTran AND Composition.RefInterne=TypeProduit.RefInterne AND Transaction.Date+0 >= ".$date->format('Ymd')." + 0 AND Transaction.Date+0 < ".$dateEnd->format('Ymd')." + 0";
	$date->modify("+1 month");
	$dateEnd->modify("+1 month");
}

for($i=0; $i<12;$i++){
$resultValeurAachat[$i] = database_query($queryachat[$i]);
$resultvente[$i] = database_query($queryvente[$i]);

$resultValeurAachat[$i] = $resultValeurAachat[$i]->fetch();
$resultvente[$i] = $resultvente[$i]->fetch();

if($resultValeurAachat[$i][0]=="") $resultValeurAachat[$i]=0;
else $resultValeurAachat[$i]=$resultValeurAachat[$i][0];

if($resultvente[$i][0]=="") $resultvente[$i]=0;
else $resultvente[$i]=$resultvente[$i][0];

$benef[$i]=$resultvente[$i]-$resultValeurAachat[$i];
}



//$ydata = array_slice($ydata, -20);
	
$graph = new PHPGraphLib(900,450);
$ydata = array("Jan" => $benef[0], "Feb" => $benef[1], "Mar" => $benef[2], "Apr" => $benef[3], "May" => $benef[4], "Jun" => $benef[5], "Jul" => $benef[6], "Aug" => $benef[7], "Sep" => $benef[8], "Oct" => $benef[9], "Nov" => $benef[10], "Dec" => $benef[11]);
$graph->addData($ydata);
$graph->setTitle($title);
$graph->setGradient('red', 'maroon');
$graph->createGraph();


?>
