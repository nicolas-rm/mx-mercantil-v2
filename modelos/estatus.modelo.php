<?php
require_once "conexion.php";

class EstatusModelo
{


    static public function actualizarEstatusModelo($datosC, $tabladb)
    {

        if ($tabladb == "ESTATUS_CONDUCTORES") {
            $pdo = Conexion::conectar()->prepare("UPDATE $tabladb SET DESCRIPCION = :DESCRIPCION, ESTATUS = :ESTATUS WHERE ID_ESTATUS_CONDUCTORES = :ID_ESTATUS_CONDUCTORES");

            $pdo->bindParam(":ID_ESTATUS_CONDUCTORES", $datosC["ID_ESTATUS_CONDUCTORES"], PDO::PARAM_INT);
        } else {
            $pdo = Conexion::conectar()->prepare("UPDATE $tabladb SET DESCRIPCION = :DESCRIPCION, ESTATUS = :ESTATUS WHERE ID_ESTATUS_CAMIONES = :ID_ESTATUS_CAMIONES");

            $pdo->bindParam(":ID_ESTATUS_CAMIONES", $datosC["ID_ESTATUS_CAMIONES"], PDO::PARAM_INT);
        }
        /* QUERY PARA LA INSERCCION A LA BASE DE DATOS */
        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":DESCRIPCION", $datosC["DESCRIPCION"], PDO::PARAM_STR);
        $pdo->bindParam(":ESTATUS", $datosC["ESTATUS"], PDO::PARAM_STR);
        $pdo->bindParam(":ID_SUCURSALES", $datosC["ID_SUCURSALES"], PDO::PARAM_INT);

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


    static public function MostrarEstatus($tabladb)
    {
        /* QUERY PARA LA INSERCCION A LA BASE DE DATOS */
        $pdo = Conexion::conectar()->prepare("SELECT * FROM $tabladb");

        /* FUNCION PARA EJECUTAR LA QUERY */
        $pdo->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $pdo->fetchAll();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $pdo->close();
    }

    static public function EditarEstatus($tabladb, $valor, $index)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabladb WHERE $valor = :$valor");

        $stmt->bindParam(":" . $valor, $index, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }

    /* FUNCION PARA AGREGAR ESTATUS A ESTATUS CAMIONES Y ESTATUS CONDUCTORES */
    public function AgregarEstatus($datosControlador, $tabladb)
    {
        /* QUERY PARA LA INSERCCION A LA BASE DE DATOS */
        $pdo = Conexion::conectar()->prepare("INSERT INTO $tabladb (DESCRIPCION,ESTATUS) VALUES (:DESCRIPCION,:ESTATUS)");

        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":DESCRIPCION", $datosControlador["DESCRIPCION"], PDO::PARAM_STR);

        /* PARAMETROS CON SUS RESPECTIVOS VALORES DE LAS COLUMNAS DE LAS TABLAS */
        $pdo->bindParam(":ESTATUS", $datosControlador["ESTATUS"], PDO::PARAM_INT);

        /* CONDICION PARA VER SI EXISTE ALGUN ERROR */
        /* FUNCION PARA EJECUTAR LA QUERY */
        if ($pdo->execute()) {
            /* RESPUESTA POR SI TODO SALIO BIEN */
            return "bien";
        } else {
            /* RESPUESTA POR SI TODO SALIO MAL */
            return "error";
        }

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $pdo->close();
    }
}
