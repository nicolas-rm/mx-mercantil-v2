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
}
