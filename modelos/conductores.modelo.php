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

        $stmt = null;
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

    static public function editarConductorModelo($tabla, $datos)
    {
        # code...

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ID_CONDUCTORES = :ID_CONDUCTORES");
        $stmt->bindParam(":ID_CONDUCTORES", $datos, PDO::PARAM_INT);
        $stmt->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $stmt->fetch();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $stmt->close();

        $stmt = null;
    }

    public function actualizarConductorModelo($datosC, $tabladb)
    {

        /* QUERY PARA LA INSERCCION A LA BASE DE DATOS */
        $pdo = Conexion::conectar()->prepare("UPDATE $tabladb SET NOMBRE = :NOMBRE, APELLIDOS = :APELLIDOS, CURP = :CURP, DIRECCION = :DIRECCION, NUMERO_LICENCIA = :NUMERO_LICENCIA,
        ANTIGUEDAD = :ANTIGUEDAD, ID_ESTATUS_CONDUCTORES = :ID_ESTATUS_CONDUCTORES WHERE ID_CONDUCTORES = :ID_CONDUCTORES");
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":ID_CONDUCTORES", $datosC["ID_CONDUCTORES"], PDO::PARAM_INT);
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":NOMBRE", $datosC["NOMBRE"], PDO::PARAM_STR);
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":APELLIDOS", $datosC["APELLIDOS"], PDO::PARAM_STR);
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":CURP", $datosC["CURP"], PDO::PARAM_STR);
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":DIRECCION", $datosC["DIRECCION"], PDO::PARAM_STR);
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":NUMERO_LICENCIA", $datosC["NUMERO_LICENCIA"], PDO::PARAM_STR);
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":ANTIGUEDAD", $datosC["ANTIGUEDAD"], PDO::PARAM_STR);
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":ID_ESTATUS_CONDUCTORES", $datosC["ID_ESTATUS_CONDUCTORES"], PDO::PARAM_STR);

        /* CONDICION PARA VER SI EXISTE ALGUN ERROR */
        /* FUNCION PARA EJECUTAR LA QUERY */
        if ($pdo->execute()) {
            /* RESPUESTA POR SI TODO SALIO BIEN */
            return "ok";
        } else {
            /* RESPUESTA POR SI TODO SALIO MAL*/
            return "error";
        }

        $pdo->close();
    }
}
