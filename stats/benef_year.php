<?php
session_start();

include("../utils/database_connection.php");
include('../graph/phpgraphlib.php');

database_connect();

$title = "Bénéfice réalisé par mois sur une année (diff prix vente prix d'achat)";
$year=2011;// PEU-ETRE CREER UN CHAMP QUI PERMET DE DEFINIR UNE DATE
$date = new DateTime();
$date->setDate($year, 1, 1);
$dateEnd = new DateTime();
$dateEnd->setDate($year, 2, 1);

for($i=0; $i<12;$i++){
	$queryvente[$i] = "SELECT SUM(Prix*Quantite) FROM Vente JOIN Transaction JOIN Composition WHERE Transaction.IdTran=Vente.IdTran AND Transaction.IdTran=Composition.IdTran AND Transaction.Date+0 >= ".$date->format('Ymd')." + 0 AND Transaction.Date+0 < ".$dateEnd->format('Ymd')." + 0";
	$queryachat[$i] = "SELECT SUM(PrixAchat*Quantite) FROM Vente JOIN Transaction JOIN Composition JOIN Typeproduit WHERE Transaction.IdTran=Vente.IdTran AND Transaction.IdTran=Composition.IdTran AND Composition.RefInterne=Typeproduit.RefInterne AND Transaction.Date+0 >= ".$date->format('Ymd')." + 0 AND Transaction.Date+0 < ".$dateEnd->format('Ymd')." + 0";
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



$year = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$ydata = array('10', '10', '1', '10', '10', '1', '10', '10', '1', '20');
$ydata = $benef;
//print_r($ydata);

// Just keep the last 20 values in the arrays
$year = array_slice($year, -20);
$ydata = array_slice($ydata, -20);
 
 // Width and height of the graph
$width = 800; $height = 400;
$data = array(12124, 5535, 43373, 22223, 90432, 23332, 15544, 24523, 32778, 38878, 28787, 33243, 34832, 32302);
 
// Create a graph instance
$graph = new PHPGraphLib($width,$height);
$graph->addData($data);
 
// Specify what scale we want to use,
// text = txt scale for the X-axis
// int = integer scale for the Y-axis
 
// Setup a title for the graph
$graph->SetTitle($title);

$graph->setGradient('red', 'maroon');
$graph->createGraph();

?>
