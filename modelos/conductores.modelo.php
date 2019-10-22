<?php

require_once "conexion.php";

class ModeloConductores
{

    /*=============================================
	MOSTRAR USUARIOS
	=============================================*/

    /*=============================================
	REGISTRO DE SUCURSAL
	=============================================*/

    static public function agregarConductorModelo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (NOMBRE, APELLIDOS, FECHA_NACIMIENTO, CURP, DIRECCION, NUMERO_LICENCIA, ANTIGUEDAD, ID_ESTATUS_CONDUCTORES) VALUES (:NOMBRE, :APELLIDOS, :FECHA_NACIMIENTO, :CURP, :DIRECCION, :NUMERO_LICENCIA, :ANTIGUEDAD, :ID_ESTATUS_CONDUCTORES)");

        $stmt->bindParam(":NOMBRE", $datos["NOMBRE"], PDO::PARAM_STR);
        $stmt->bindParam(":APELLIDOS", $datos["APELLIDOS"], PDO::PARAM_STR);
        $stmt->bindParam(":FECHA_NACIMIENTO", $datos["FECHA_NACIMIENTO"], PDO::PARAM_STR);
        $stmt->bindParam(":CURP", $datos["CURP"], PDO::PARAM_STR);
        $stmt->bindParam(":DIRECCION", $datos["DIRECCION"], PDO::PARAM_STR);
        $stmt->bindParam(":NUMERO_LICENCIA", $datos["NUMERO_LICENCIA"], PDO::PARAM_STR);
        $stmt->bindParam(":ANTIGUEDAD", $datos["ANTIGUEDAD"], PDO::PARAM_STR);
        $stmt->bindParam(":ID_ESTATUS_CONDUCTORES", $datos["ID_ESTATUS_CONDUCTORES"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }


    /*=============================================
	EDITAR CATEGORIA
	=============================================*/
}
