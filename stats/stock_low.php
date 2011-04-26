<?php
session_start();

include("database_connection.php");

require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('jpgraph/jpgraph_bar.php');

database_connect();

$title = "Entrepot dont le stock est inférieur à celui précisé (20 premiers)";

$limit=10; // PEUT ETRE CREER UN CHAMP QUI PERMET DE DEFINIR UNE DATE

$query = "SELECT * FROM Stock WHERE Quantite < ".$limit;
$result = database_query($query);
$result = $result->fetchAll();
$n = count($result);
$xname = Array(0);
$ydata = Array(0);
for($i=0; $i<$n;$i++){
	$xname[$i] = $result[$i][0];
	$ydata[$i] = $result[$i][2];
}

// Just keep the last 20 values in the arrays
$xname = array_slice($xname, -20);
$ydata = array_slice($ydata, -20);

 //print_r($xname);
 //print_r($ydata);
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
$graph->xaxis->title->Set('(Place)');
$graph->xaxis->SetTickLabels($xname);
$graph->xaxis->SetLabelAngle(90);
$graph->xaxis->SetLabelMargin(-5);

// Setup Y-axis title
$graph->yaxis->title->Set('(Quantity)');
 
// Create the bar plot
$barplot=new BarPlot($ydata);
 
// Add the plot to the graph
$graph->Add($barplot);
 
// Display the graph
?>
<?php
$graph->Stroke();
?>