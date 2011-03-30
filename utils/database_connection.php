<?php

$username = "root"
$password = "root"
$dbname = "test";
$host = "localhost";



function database_connect(){
	try{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=localhost;dbname=tzest', 'root', 'root', $pdo_options);
	}catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
}

database_connect();
?>
