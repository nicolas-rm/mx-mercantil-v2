<?php

require_once "conexion.php";

class ModeloCalendario{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarCalendario(){

 

		$stmt = Conexion::conectar()->prepare("SELECT c.ID_CAMIONES, c.NOMBRE_CAMION from camiones c INNER JOIN events e ON c.NOMBRE_CAMION = e.title WHERE e.start >= CURDATE() AND e.start <= DATE_ADD(CURDATE(), INTERVAL 2 DAY) AND e.estatus = 1");

			$stmt -> execute();

			return $stmt -> fetchAll();

		

		$stmt -> close();

		$stmt = null;

	}
 // UPDATE events SET estatus = 0 WHERE estatus = 1"

	static public function mdlBorrarCalendario(){

		$stmt = Conexion::conectar()->prepare("UPDATE events INNER JOIN  camiones ON events.title = camiones.NOMBRE_CAMION SET events.estatus = 0 WHERE camiones.ESTATUS_CAMIONES = 'Mantenimiento'");

		 $stmt -> execute();

		 return $stmt -> fetchAll();

		

		$stmt -> close();

		$stmt = null;


	}



}