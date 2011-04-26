<?php
session_start();

include("database_connection.php");

require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('jpgraph/jpgraph_bar.php');

database_connect();

$title = "Valeur totale de l'entreprise sur l'année choisie (Actif - Passif)";
$year=2011; // PEUT ETRE ECRER UN CHAMP QUI PERMET DE PRECISER UNE DATE

$date = new DateTime();
$date->setDate($year, 1, 1);

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



// Setup the graph
$graph = new Graph(800,400);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set($title);
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
//$graph->xaxis->HideZeroLabel();
//$graph->xaxis->HideLine(false);
$graph->xaxis->SetTextLabelInterval(20);
$graph->xaxis->HideTicks(false,false);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$pv = new LinePlot($resultvente);
$graph->Add($pv);
$pv->SetColor("#6495ED");
$pv->SetLegend('Total des achats');

// Create the second line
$pa = new LinePlot($resultachat);
$graph->Add($pa);
$pa->SetColor("#B22222");
$pa->SetLegend('Total des ventes');

// Create the third line
$p = new LinePlot($valeur);
$graph->Add($p);
$p->SetColor("#FF1493");
$p->SetLegend('Balance');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();


?>