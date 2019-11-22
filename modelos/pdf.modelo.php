<?php


require_once "conexion.php";
class pdfModelo
{

    static public function mostrarDatosPDFConductores()
    {
        # code...
        $stmt = Conexion::conectar()->prepare("SELECT T1.ID_CONDUCTORES, T1.NOMBRE, T1.APELLIDOS, T1.NUMERO_LICENCIA, T2.DESCRIPCION FROM CONDUCTORES AS T1 INNER JOIN ESTATUS_CONDUCTORES AS T2 ON T1.ID_ESTATUS_CONDUCTORES = T2.ID_ESTATUS_CONDUCTORES AND T2.DESCRIPCION != 'INACTIVO' ");
        $stmt->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $stmt->fetchAll();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $stmt->close();

        $stmt = null;

        /* ESTATUS - CAMIONES / CONDUCTORES */
        /* CONDUCTORES */
        /* CAMIONES */
        /* REFACCIONES */
        /* VIAJE */
    }

    static public function mostrarDatosPDFCamionesUnique($id)
    {
        # code...
        $stmt = Conexion::conectar()->prepare("SELECT T1.DESCRIPCION, T1.NOMBRE_CAMION, T2.NOMBRE, T1.ESTATUS_CAMIONES, T1.TIPO_CAMION, T3.nombre FROM sucursales AS T3 INNER JOIN CAMIONES AS T1 INNER JOIN CONDUCTORES AS T2 ON T1.ID_CAMIONES = :ID_CAMIONES AND T1.ID_CONDUCTORES = T2.ID_CONDUCTORES AND T3.id = T1.ID_SUCURSALES");
        $stmt->bindParam(":ID_CAMIONES", $id, PDO::PARAM_INT);

        $stmt->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $stmt->fetchAll();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $stmt->close();

        $stmt = null;

        /* ESTATUS - CAMIONES / CONDUCTORES */
        /* CONDUCTORES */
        /* CAMIONES */
        /* REFACCIONES */
        /* VIAJE */
    }
    static public function mostrarDatosMantenimientoUnique($id)
    {
        # code...
        $stmt = Conexion::conectar()->prepare("");
        $stmt->bindParam(":ID_CAMIONES", $id, PDO::PARAM_INT);

        $stmt->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $stmt->fetchAll();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $stmt->close();

        $stmt = null;

        /* ESTATUS - CAMIONES / CONDUCTORES */
        /* CONDUCTORES */
        /* CAMIONES */
        /* REFACCIONES */
        /* VIAJE */
    }
}
