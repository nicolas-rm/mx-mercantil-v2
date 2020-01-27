<?php

require_once "conexion.php";

class ModeloConductores
{

        static public function mdlMostrarEstatusC($tabla, $item, $valor){

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

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (NOMBRE, APELLIDOS, TELEFONO, NUMERO_LICENCIA,ID_ESTATUS_CONDUCTORES, ID_SUCURSALES) VALUES (:NOMBRE, :APELLIDOS, :TELEFONO, :NUMERO_LICENCIA, :ID_ESTATUS_CONDUCTORES, :ID_SUCURSALES)");

        $stmt->bindParam(":NOMBRE", $datos["NOMBRE"], PDO::PARAM_STR);
        $stmt->bindParam(":APELLIDOS", $datos["APELLIDOS"], PDO::PARAM_STR);
        $stmt->bindParam(":TELEFONO", $datos["TELEFONO"], PDO::PARAM_STR);
        $stmt->bindParam(":NUMERO_LICENCIA", $datos["NUMERO_LICENCIA"], PDO::PARAM_STR);
        $stmt->bindParam(":ID_ESTATUS_CONDUCTORES", $datos["ID_ESTATUS_CONDUCTORES"], PDO::PARAM_STR);
        $stmt->bindParam(":ID_SUCURSALES", $datos["ID_SUCURSALES"], PDO::PARAM_STR);

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
        $pdo = Conexion::conectar()->prepare("UPDATE $tabladb SET NOMBRE = :NOMBRE, APELLIDOS = :APELLIDOS, TELEFONO = :TELEFONO, NUMERO_LICENCIA = :NUMERO_LICENCIA, ID_ESTATUS_CONDUCTORES = :ID_ESTATUS_CONDUCTORES, ID_SUCURSALES = :ID_SUCURSALES WHERE ID_CONDUCTORES = :ID_CONDUCTORES");
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":ID_CONDUCTORES", $datosC["ID_CONDUCTORES"], PDO::PARAM_INT);
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":NOMBRE", $datosC["NOMBRE"], PDO::PARAM_STR);
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":APELLIDOS", $datosC["APELLIDOS"], PDO::PARAM_STR);
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":TELEFONO", $datosC["TELEFONO"], PDO::PARAM_STR);
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":NUMERO_LICENCIA", $datosC["NUMERO_LICENCIA"], PDO::PARAM_STR);
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":ID_ESTATUS_CONDUCTORES", $datosC["ID_ESTATUS_CONDUCTORES"], PDO::PARAM_STR);

        $pdo->bindParam(":ID_SUCURSALES", $datosC["ID_SUCURSALES"], PDO::PARAM_STR);

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

    static public function eliminarConductor($tabladb, $id)
    {
        # code...

        $pdo = Conexion::conectar()->prepare("UPDATE $tabladb SET ID_ESTATUS_CONDUCTORES = '1' WHERE ID_CONDUCTORES = :ID_CONDUCTORES");
        // $pdo->bindParam(":ID_ESTATUS_CONDUCTORES", "1", PDO::PARAM_STR);
        $pdo->bindParam(":ID_CONDUCTORES", $id, PDO::PARAM_INT);
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
