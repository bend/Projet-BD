<?php

$bdd;
function database_connect(){
$username = 'root';
$password = 'root';
$dbname = 'STOCK';
$host = 'localhost';

	try{
	    global $bdd;

		$bdd = new PDO("mysql:host=$host;dbname=$dbname", $username,$password);
	}catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
}

function database_query($query){
	global $bdd;
	try{
		return $bdd->query($query);
	}catch(Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
}

function database_edit($query){
	global $bdd;
	try{
		$query_prepare_1=$bdd->prepare($query); 
		$query_prepare_1->execute();
		return $query_prepare_1;
	}catch(Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
}

function database_getlast_inserted_id(){
	global $bdd;
	return $bdd->lastInsertId();
}


/*database_connect();
echo 'ok';
echo 'ok';
$requete_prepare_1=database_query("SELECT * from test");
while($lignes=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
{
	        echo 'res' .$lignes->t.'<br />';
}



?>
 */
