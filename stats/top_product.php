<?php 

include("../utils/database_connection.php");
include('../graph/phpgraphlib.php');
include('../graph/phpgraphlib_pie.php');

$year_from = $_GET['year_from'];
$month_from = $_GET['month_from'];
$day_from = $_GET['day_from'];
$n = $_GET['n'];


$year_to = $_GET['year_to'];
$month_to = $_GET['month_to'];
$day_to = $_GET['day_to'];
database_connect();


$date_from = new DateTime();
$date_to = new DateTime();
$date_from->setDate($year_from, $month_from, $day_from);
$date_to->setDate($year_to, $month_to, $day_to);
$query = "SELECT RefInterne, Marque,Denomination,Sum(Quantite) as q FROM Transaction NATURAL JOIN Composition NATURAL JOIN TypeProduit WHERE Date<".$date_to->format('Ymd')."+0 AND Date >".$date_from->format('Ymd')."+0 AND IdTran IN (SELECT IdTran FROM Vente) GROUP BY RefInterne ORDER BY q DESC LIMIT ".$n;

$title = "The ".$n." most sold products for the Period ".$date_from->format('N/m/Y')." to ".$date_to->format('N/m/Y');

$data = array();
$result = database_query($query);
while($row = $result->fetch()){
	$data[$row['Marque'].' '.$row['Denomination']]=$row['q'];

}

$graph = new PHPGraphLibPie(640, 480);
$graph->addData($data);
$graph->setTitle($title);
$graph->setLabelTextColor('50,50,50');
$graph->setLegendTextColor('50,50,50');
$graph->createGraph();

?>
