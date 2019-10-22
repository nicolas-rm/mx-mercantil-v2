<?php

require_once "conexion.php";

class ModeloEmpleados{


	static public function mdlMostrarEmpleados($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}


	static public function mdlIngresarEmpleado($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_sucursal, nombre , telefono) VALUES (:id_sucursal, :nombre, :telefono )");


		$stmt->bindParam(":id_sucursal", $datos["id_sucursal"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR); 
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}



	 /*=============================================
	BORRAR EMPLEADO
	=============================================*/

	static public function mdlBorrarEmpleado($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

			/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarEmpleado($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_sucursal = :id_sucursal, nombre = :nombre, telefono = :telefono WHERE id = :id");  

		$stmt -> bindParam(":id_sucursal", $datos["id_sucursal"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}





}