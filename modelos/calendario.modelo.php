<?php

require_once "conexion.php";

class ModeloCalendario{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarCalendario(){

 

		$stmt = Conexion::conectar()->prepare("SELECT c.ID_CAMIONES, c.NOMBRE_CAMION from camiones c INNER JOIN events e ON c.NOMBRE_CAMION = e.title WHERE e.start >= CURDATE() AND e.start <= DATE_ADD(CURDATE(), INTERVAL 2 DAY)");

			$stmt -> execute();

			return $stmt -> fetchAll();

		

		$stmt -> close();

		$stmt = null;

	}
 

	static public function mdlBorrarCalendario(){

		$stmt = Conexion::conectar()->prepare("DELETE FROM events where estatus = 1");

		 $stmt -> execute();

		 return $stmt -> fetchAll();

		

		$stmt -> close();

		$stmt = null;


	}



}