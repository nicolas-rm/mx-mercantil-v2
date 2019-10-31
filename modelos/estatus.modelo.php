<?php
require_once "conexion.php";

class EstatusModelo
{

    static public function MostrarEstatus($tabladb)
    {
        /* QUERY PARA LA INSERCCION A LA BASE DE DATOS */
        $pdo = Conexion::conectar()->prepare("SELECT * FROM $tabladb WHERE ESTATUS = 1");

        /* FUNCION PARA EJECUTAR LA QUERY */
        $pdo->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $pdo->fetchAll();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $pdo->close();
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
