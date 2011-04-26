<?php
session_start();

include("database_connection.php");

require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('jpgraph/jpgraph_bar.php');

database_connect();

$title = "Bénéfice réalisé par jour sur une semaine (diff prix vente prix d'achat)";
$year=2011; // PEUT ETRE ECRER UN CHAMP QUI PERMET DE PRECISER UNE DATE
$month=4;// PEUT ETRE ECRER UN CHAMP QUI PERMET DE PRECISER UNE DATE
$semaine=0; // PEUT ETRE ECRER UN CHAMP QUI PERMET DE PRECISER UNE DATE
$day = $semaine*7;
$date = new DateTime();
$date->setDate($year, $month, $day);
$dateEnd = new DateTime();
$dateEnd->setDate($year, $month, ($day+1));

for($i=0; $i<7;$i++){
	$queryvente[$i] = "SELECT SUM(Prix*Quantite) FROM Vente JOIN Transaction JOIN Composition WHERE Transaction.IdTran=Vente.IdTran AND Transaction.IdTran=Composition.IdTran AND Transaction.Date+0 >= ".$date->format('Ymd')." + 0 AND Transaction.Date+0 < ".$dateEnd->format('Ymd')." + 0";
	$queryachat[$i] = "SELECT SUM(PrixAchat*Quantite) FROM Vente JOIN Transaction JOIN Composition JOIN Typeproduit WHERE Transaction.IdTran=Vente.IdTran AND Transaction.IdTran=Composition.IdTran AND Composition.RefInterne=Typeproduit.RefInterne AND Transaction.Date+0 >= ".$date->format('Ymd')." + 0 AND Transaction.Date+0 < ".$dateEnd->format('Ymd')." + 0";
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
//echo $resultvente[$i]."-".$resultValeurAachat[$i]."\n";
//echo $benef[$i];
}



$year = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
$ydata = $benef;
//print_r($ydata);

// Just keep the last 20 values in the arrays
$year = array_slice($year, -20);
$ydata = array_slice($ydata, -20);
 
 // Width and height of the graph
$width = 800; $height = 400;
 
// Create a graph instance
$graph = new Graph($width,$height);
 
// Specify what scale we want to use,
// text = txt scale for the X-axis
// int = integer scale for the Y-axis
$graph->SetScale('textint');
 
// Setup a title for the graph
$graph->title->Set($title);
 
// Setup titles and X-axis labels
$graph->xaxis->title->Set('(month)');
$graph->xaxis->SetTickLabels($year);
 
// Setup Y-axis title
$graph->yaxis->title->Set('(euro)');
 
// Create the bar plot
$barplot=new BarPlot($ydata);
 
// Add the plot to the graph
$graph->Add($barplot);
 
// Display the graph
$graph->Stroke();


?>
