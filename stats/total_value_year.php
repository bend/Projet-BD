<?php

include("../utils/database_connection.php");
include('../graph/phpgraphlib.php');
include('../graph/phpgraphlib_pie.php');
$year_from = $_GET['year'];


database_connect();


$title = "Total value of the company on the chosen year (Assets - Liabilities)";


try {
	date_default_timezone_set('Europe/Brussels');
    $date = new DateTime();
}catch (Exception $e) {
	echo $e->getMessage();
	exit(1);
}
$date->setDate($year_from, 1, 1);

$querypastvente = "SELECT SUM(Prix*Quantite) FROM Vente JOIN Transaction JOIN Composition WHERE Transaction.IdTran=Vente.IdTran AND Transaction.IdTran=Composition.IdTran AND Transaction.Date+0 < ".$date->format('Ymd')."+0";
$querypastachat = "SELECT SUM(Prix*Quantite) FROM Achat JOIN Transaction JOIN Composition WHERE Transaction.IdTran=Achat.IdTran AND Transaction.IdTran=Composition.IdTran AND Transaction.Date+0 < ".$date->format('Ymd')."+0";
	
$resultpastachat = database_query($querypastachat);
$resultpastvente = database_query($querypastvente);
$resultpastachat = $resultpastachat->fetch();
$resultpastvente = $resultpastvente->fetch();
if($resultpastachat[0]=="") $resultpastachat=0;
else $resultpastachat=$resultpastachat[0];
if($resultpastvente[0]=="") $resultpastvente=0;
else $resultpastvente=$resultpastvente[0];
	
for($i=0; $i<365;$i++){
	$queryvente[$i] = "SELECT SUM(Prix*Quantite) FROM Vente JOIN Transaction JOIN Composition WHERE Transaction.IdTran=Vente.IdTran AND Transaction.IdTran=Composition.IdTran AND Transaction.Date+0 = ".$date->format('Ymd')."+0";
	$queryachat[$i] = "SELECT SUM(Prix*Quantite) FROM Achat JOIN Transaction JOIN Composition WHERE Transaction.IdTran=Achat.IdTran AND Transaction.IdTran=Composition.IdTran AND Transaction.Date+0 = ".$date->format('Ymd')."+0";
	$date->modify("+1 day");
}

for($i=0; $i<365;$i++){

	$resultachat[$i] = database_query($queryachat[$i]);
	$resultvente[$i] = database_query($queryvente[$i]);


	$resultachat[$i] = $resultachat[$i]->fetch();
	$resultvente[$i] = $resultvente[$i]->fetch();
	

	if($resultachat[$i][0]=="") $resultachat[$i]=0;
	else $resultachat[$i]=$resultachat[$i][0];

	if($resultvente[$i][0]=="") $resultvente[$i]=0;
	else $resultvente[$i]=$resultvente[$i][0];
	if($i>0){
		$resultvente[$i] = $resultvente[$i]+$resultvente[$i-1];
		$resultachat[$i] = $resultachat[$i]+$resultachat[$i-1];
	}
	else {
		$resultvente[$i] = $resultvente[$i] + $resultpastvente;
		$resultachat[$i] = $resultachat[$i] + $resultpastachat;
	}
	$valeur[$i]=$resultvente[$i]-$resultachat[$i];

}


for($i=0;$i<365;$i+=6){
	$valeurCut[$i] = $valeur[$i];
	$resultventeCut[$i] = $resultvente[$i];
	$resultachatCut[$i] = $resultachat[$i];
}

$graph = new PHPGraphLib(900,450);
$graph->addData($valeurCut,$resultventeCut,$resultachatCut);
$graph->setTitle($title);
$graph->setTitleLocation('left');
$graph->setBars(false);
$graph->setLine(true);
$graph->setLineColor("navy", "red","blue");
$graph->setLegend(true);
$graph->setLegendTitle("Balance","Total sales","Total purchases");
//$graph->setDataPoints(true);
//$graph->setDataPointColor('maroon');
//$graph->setDataValues(true);
//$graph->setDataValueColor('maroon');

$graph->createGraph();
database_close();

	

?>
