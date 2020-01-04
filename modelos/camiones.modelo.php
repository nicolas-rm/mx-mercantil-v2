<?php

require_once "conexion.php";

class ModeloCamiones
{

    /*=============================================
	REGISTRAR CONDUCTORES
	=============================================*/

    static public function agregarCamionesModelo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (DESCRIPCION, NUMERO_SERIE, NUMERO_PLACAS, NOMBRE_CAMION, MODELO,
        TIPO_CAMION, ESTATUS_CAMIONES, ID_CONDUCTORES, ID_SUCURSALES) VALUES (:DESCRIPCION, :NUMERO_SERIE, :NUMERO_PLACAS, :NOMBRE_CAMION, :MODELO, :TIPO_CAMION, :ESTATUS_CAMIONES, :ID_CONDUCTORES, :ID_SUCURSALES)");

        $stmt->bindParam(":DESCRIPCION", $datos["DESCRIPCION"], PDO::PARAM_STR);
        $stmt->bindParam(":NUMERO_SERIE", $datos["NUMERO_SERIE"], PDO::PARAM_STR);
        $stmt->bindParam(":NUMERO_PLACAS", $datos["NUMERO_PLACAS"], PDO::PARAM_STR);
        $stmt->bindParam(":NOMBRE_CAMION", $datos["NOMBRE_CAMION"], PDO::PARAM_STR);
        $stmt->bindParam(":MODELO", $datos["MODELO"], PDO::PARAM_STR);
        $stmt->bindParam(":TIPO_CAMION", $datos["TIPO_CAMION"], PDO::PARAM_STR);
        $stmt->bindParam(":ESTATUS_CAMIONES", $datos["ESTATUS_CAMIONES"], PDO::PARAM_STR);
        $stmt->bindParam(":ID_CONDUCTORES", $datos["ID_CONDUCTORES"], PDO::PARAM_STR);
        $stmt->bindParam(":ID_SUCURSALES", $datos["ID_SUCURSALES"], PDO::PARAM_STR);
        // $stmt->bindParam(":ID_ESTATUS_CAMIONES", $datos["ID_ESTATUS_CAMIONES"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }


    static public function mostrarCamionesModelo($tabla)
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

    static public function mostrarCamionesLibre($tabla)
    {
        # code...
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where ESTATUS_CAMIONES = 'Disponible'");
        $stmt->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $stmt->fetchAll();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $stmt->close();

        $stmt = null;
    }

    static public function mostrarCamionesMantenimiento($tabla)
    {
        # code...
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where ESTATUS_CAMIONES = 'Mantenimiento'");
        $stmt->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $stmt->fetchAll();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $stmt->close();

        $stmt = null;
    }

    static public function editarCamionesModelo($tabla,$id)
    {
        # code...
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ID_CAMIONES = :ID_CAMIONES");
        $stmt->bindParam(":ID_CAMIONES", $id, PDO::PARAM_INT);

        $stmt->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $stmt->fetch();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $stmt->close();

        $stmt = null;
    }

    static public function actualizarCamionesModelo($estatus,$id)
    {


        $pdo = Conexion::conectar()->prepare("UPDATE CAMIONES SET ESTATUS_CAMIONES = :ESTATUS_CAMIONES WHERE ID_CAMIONES = :ID_CAMIONES");


        /* QUERY PARA LA INSERCCION A LA BASE DE DATOS */
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":ESTATUS_CAMIONES", $estatus, PDO::PARAM_STR);
        $pdo->bindParam(":ID_CAMIONES", $id, PDO::PARAM_INT);
        // $pdo->bindParam(":ID_SUCURSALES", $datosC["ID_SUCURSALES"], PDO::PARAM_);

        /* CONDICION PARA VER SI EXISTE ALGUN ERROR */
        /* FUNCION PARA EJECUTAR LA QUERY */
        if ($pdo->execute()) {
            /* RESPUESTA POR SI TODO SALIO BIEN */
            // var_dump($datosC);
            return "ok";
        } else {
            // var_dump($datosC);

            /* RESPUESTA POR SI TODO SALIO MAL*/
            return "error";
        }

        $pdo->close();
    }


    static public function updateCamionesModelo($tabla,$datos)
    {


        $pdo = Conexion::conectar()->prepare("UPDATE $tabla SET DESCRIPCION = :DESCRIPCION, NUMERO_SERIE = :NUMERO_SERIE, NUMERO_PLACAS = :NUMERO_PLACAS, NOMBRE_CAMION = :NOMBRE_CAMION, MODELO = :MODELO, TIPO_CAMION = :TIPO_CAMION, ESTATUS_CAMIONES = :ESTATUS_CAMIONES, ID_CONDUCTORES = :ID_CONDUCTORES, ID_SUCURSALES = :ID_SUCURSALES WHERE ID_CAMIONES = :ID_CAMIONES");


        /* QUERY PARA LA INSERCCION A LA BASE DE DATOS */
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":DESCRIPCION", $datos["DESCRIPCION"], PDO::PARAM_STR);
        $pdo->bindParam(":NUMERO_SERIE", $datos["NUMERO_SERIE"], PDO::PARAM_STR);
        $pdo->bindParam(":NUMERO_PLACAS", $datos["NUMERO_PLACAS"], PDO::PARAM_STR);
        $pdo->bindParam(":NOMBRE_CAMION", $datos["NOMBRE_CAMION"], PDO::PARAM_STR);
        $pdo->bindParam(":MODELO", $datos["MODELO"], PDO::PARAM_STR);
        $pdo->bindParam(":TIPO_CAMION", $datos["TIPO_CAMION"], PDO::PARAM_STR);
        $pdo->bindParam(":ESTATUS_CAMIONES", $datos["ESTATUS_CAMIONES"], PDO::PARAM_STR);
        $pdo->bindParam(":ID_CONDUCTORES", $datos["ID_CONDUCTORES"], PDO::PARAM_STR);
        $pdo->bindParam(":ID_SUCURSALES", $datos["ID_SUCURSALES"], PDO::PARAM_STR);
        $pdo->bindParam(":ID_CAMIONES", $datos["ID_CAMIONES"], PDO::PARAM_STR);
        // $pdo->bindParam(":ID_SUCURSALES", $datosC["ID_SUCURSALES"], PDO::PARAM_);

        /* CONDICION PARA VER SI EXISTE ALGUN ERROR */
        /* FUNCION PARA EJECUTAR LA QUERY */
        if ($pdo->execute()) {
            /* RESPUESTA POR SI TODO SALIO BIEN */
            // var_dump($datosC);
            return "ok";
        } else {
            // var_dump($datosC);

            /* RESPUESTA POR SI TODO SALIO MAL*/
            return "error";
        }

        $pdo->close();
    }

        static public function updateCamionesModelo2($tabla,$datos)
    {


        $pdo = Conexion::conectar()->prepare("UPDATE $tabla SET NOMBRE_CAMION = :NOMBRE_CAMION, ESTATUS_CAMIONES = :ESTATUS_CAMIONES, ID_CONDUCTORES = :ID_CONDUCTORES WHERE ID_CAMIONES = :ID_CAMIONES");


        /* QUERY PARA LA INSERCCION A LA BASE DE DATOS */
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
         
        $pdo->bindParam(":NOMBRE_CAMION", $datos["NOMBRE_CAMION"], PDO::PARAM_STR);
         
        $pdo->bindParam(":ESTATUS_CAMIONES", $datos["ESTATUS_CAMIONES"], PDO::PARAM_STR);
        $pdo->bindParam(":ID_CONDUCTORES", $datos["ID_CONDUCTORES"], PDO::PARAM_STR);
         
        $pdo->bindParam(":ID_CAMIONES", $datos["ID_CAMIONES"], PDO::PARAM_STR);
        // $pdo->bindParam(":ID_SUCURSALES", $datosC["ID_SUCURSALES"], PDO::PARAM_);

        /* CONDICION PARA VER SI EXISTE ALGUN ERROR */
        /* FUNCION PARA EJECUTAR LA QUERY */
        if ($pdo->execute()) {
            /* RESPUESTA POR SI TODO SALIO BIEN */
            // var_dump($datosC);
            return "ok";
        } else {
            // var_dump($datosC);

            /* RESPUESTA POR SI TODO SALIO MAL*/
            return "error";
        }

        $pdo->close();
    }


    static public function eliminarCamionesModelo($tabla,$id)
    {


        $pdo = Conexion::conectar()->prepare("UPDATE $tabla SET ESTATUS_CAMIONES = 'Inactivo' WHERE ID_CAMIONES = :ID_CAMIONES");


        /* QUERY PARA LA INSERCCION A LA BASE DE DATOS */
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        // $pdo->bindParam(":DESCRIPCION", $datos["DESCRIPCION"], PDO::PARAM_STR);
        // $pdo->bindParam(":NUMERO_SERIE", $datos["NUMERO_SERIE"], PDO::PARAM_STR);
        // $pdo->bindParam(":NUMERO_PLACAS", $datos["NUMERO_PLACAS"], PDO::PARAM_STR);
        // $pdo->bindParam(":NOMBRE_CAMION", $datos["NOMBRE_CAMION"], PDO::PARAM_STR);
        // $pdo->bindParam(":MODELO", $datos["MODELO"], PDO::PARAM_STR);
        // $pdo->bindParam(":TIPO_CAMION", $datos["TIPO_CAMION"], PDO::PARAM_STR);
        // $pdo->bindParam(":ESTATUS_CAMIONES", $datos["ESTATUS_CAMIONES"], PDO::PARAM_STR);
        // $pdo->bindParam(":ID_CONDUCTORES", $datos["ID_CONDUCTORES"], PDO::PARAM_STR);
        // $pdo->bindParam(":ID_SUCURSALES", $datos["ID_SUCURSALES"], PDO::PARAM_STR);
        $pdo->bindParam(":ID_CAMIONES", $id, PDO::PARAM_STR);
        // $pdo->bindParam(":ID_SUCURSALES", $datosC["ID_SUCURSALES"], PDO::PARAM_);

        /* CONDICION PARA VER SI EXISTE ALGUN ERROR */
        /* FUNCION PARA EJECUTAR LA QUERY */
        if ($pdo->execute()) {
            /* RESPUESTA POR SI TODO SALIO BIEN */
            // var_dump($datosC);
            return "ok";
        } else {
            // var_dump($datosC);

            /* RESPUESTA POR SI TODO SALIO MAL*/
            return "error";
        }

        $pdo->close();
    }

 
}

 
 