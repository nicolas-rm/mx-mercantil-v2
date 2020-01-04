<?php

require_once "conexion.php";

class ModeloMantenimientos{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarMantenimientos($tabla, $item, $valor){

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
 


	/*=============================================
	REGISTRO DE SUCURSAL
	=============================================*/

	static public function mdlIngresarMantenimiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_sucursal,ID_CONDUCTORES,ID_CAMIONES,nombre_taller,kilometraje,descripcion,nombre_mecanico,precio ) VALUES (:id_sucursal,:ID_CONDUCTORES,:ID_CAMIONES,:nombre_taller,:kilometraje,:descripcion,:nombre_mecanico,:precio)");

        $stmt->bindParam(":id_sucursal", $datos["id_sucursal"], PDO::PARAM_STR);
        $stmt->bindParam(":ID_CONDUCTORES", $datos["ID_CONDUCTORES"], PDO::PARAM_STR);
        $stmt->bindParam(":ID_CAMIONES", $datos["ID_CAMIONES"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_taller", $datos["nombre_taller"], PDO::PARAM_STR);
        $stmt->bindParam(":kilometraje", $datos["kilometraje"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_mecanico", $datos["nombre_mecanico"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

 
	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarMantenimiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_sucursal = :id_sucursal,ID_CONDUCTORES = :ID_CONDUCTORES,ID_CAMIONES = :ID_CAMIONES, nombre_taller = :nombre_taller, kilometraje = :kilometraje, descripcion =:descripcion, nombre_mecanico = :nombre_mecanico ,precio = :precio WHERE id = :id");

         $stmt -> bindParam(":id_sucursal", $datos["id_sucursal"], PDO::PARAM_STR);
         $stmt -> bindParam(":ID_CONDUCTORES", $datos["ID_CONDUCTORES"], PDO::PARAM_STR);
         $stmt -> bindParam(":ID_CAMIONES", $datos["ID_CAMIONES"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_taller", $datos["nombre_taller"], PDO::PARAM_STR);
        $stmt->bindParam(":kilometraje", $datos["kilometraje"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_mecanico", $datos["nombre_mecanico"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
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