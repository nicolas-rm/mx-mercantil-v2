<?php

require_once "conexion.php";

class ModeloConductores
{

    /*=============================================
	MOSTRAR CONDUCTORES
    =============================================*/
    static public function mostrarConductorModelo($tabla)
    {
        # code...
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $stmt->fetchAll();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $stmt->close();
    }

    /*=============================================
	REGISTRAR CONDUCTORES
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
	EDITAR CONDUCTORES
    =============================================*/

    static public function editarConductorModelo($editConductor, $tabladb)
    {

        /* QUERY PARA LA INSERCCION A LA BASE DE DATOS */
        $pdo = Conexiondb::conexion()->prepare("SELECT * FROM $tabladb WHERE ID_CONDUCTORES = :ID_CONDUCTORES");
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":ID_CONDUCTORES", $editConductor, PDO::PARAM_INT);
        /* FUNCION PARA EJECUTAR LA QUERY */
        $pdo->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $pdo->fetch();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $pdo->close();
    }
}
