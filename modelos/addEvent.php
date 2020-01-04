<?php

// Conexion a la base de datos
require_once('bdd.php');
 

if (isset($_POST['title'])  && isset($_POST['start']) && isset($_POST['HoraI']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$HoraI = $_POST['HoraI'];
	$color = $_POST['color'];
	$estatus = $_POST['estatus'];


	$aux = $start." ".$HoraI;
	$start = $aux;
	$end = $start;

	$sql = "INSERT INTO events(title, start, end, color, estatus) values ('$title', '$start', '$end', '$color', '$estatus')";
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
}

// header('Location: '.$_SERVER['HTTP_REFERER']);  

header('Location: '.$_SERVER['HTTP_REFERER']); 

			 
?>

