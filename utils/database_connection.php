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

function database_close(){
	global $bdd;
	$bdd = null;
}

function database_begin_tr(){
	global $bdd;
	$bdd->beginTransaction();	
}

function database_commit_tr(){
	global $bdd;
	$bdd->commit();
}
?>
 
