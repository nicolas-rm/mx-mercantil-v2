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
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS DATOS, T1.DESCRIPCION, T1.NOMBRE_CAMION, T2.NOMBRE, T1.ESTATUS_CAMIONES, T1.TIPO_CAMION, T3.nombre FROM sucursales AS T3 INNER JOIN CAMIONES AS T1 INNER JOIN CONDUCTORES AS T2 ON T1.ID_CAMIONES = :ID_CAMIONES AND T1.ID_CONDUCTORES = T2.ID_CONDUCTORES AND T3.id = T1.ID_SUCURSALES");
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
        $stmt = Conexion::conectar()->prepare("SELECT sucursales.nombre ,conductores.NOMBRE,camiones.NOMBRE_CAMION,mantenimiento.nombre_taller, mantenimiento.kilometraje,mantenimiento.descripcion,mantenimiento.nombre_mecanico,mantenimiento.precio FROM mantenimiento INNER JOIN sucursales on mantenimiento.id_sucursal=sucursales.id inner join camiones on mantenimiento.ID_CAMIONES=camiones.ID_CAMIONES inner join conductores on mantenimiento.ID_CONDUCTORES=conductores.ID_CONDUCTORES AND mantenimiento.id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $stmt->fetchAll();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $stmt->close();

        $stmt = null;
    }

    static public function mostrarDatosPDFMante()
    {
        # code...
        $stmt = Conexion::conectar()->prepare("SELECT sucursales.nombre ,conductores.NOMBRE,camiones.NOMBRE_CAMION,mantenimiento.nombre_taller, mantenimiento.kilometraje,mantenimiento.descripcion,mantenimiento.nombre_mecanico,mantenimiento.precio FROM mantenimiento INNER JOIN sucursales on mantenimiento.id_sucursal=sucursales.id inner join camiones on mantenimiento.ID_CAMIONES=camiones.ID_CAMIONES inner join conductores on mantenimiento.ID_CONDUCTORES=conductores.ID_CONDUCTORES ");


        $stmt->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $stmt->fetchAll();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $stmt->close();

        $stmt = null;
    }

    static public function mostrarDatosPDFMantetota()
    {
        # code...
        $stmt1 = Conexion::conectar()->prepare("SELECT sucursales.nombre,camiones.NOMBRE_CAMION,SUM(mantenimiento.precio) TOTAL, COUNT(camiones.NOMBRE_CAMION) AS mantenimientos_totales FROM mantenimiento INNER JOIN sucursales on mantenimiento.id_sucursal=sucursales.id inner join camiones on mantenimiento.ID_CAMIONES=camiones.ID_CAMIONES GROUP BY sucursales.id,camiones.NOMBRE_CAMION HAVING COUNT(*)>=1");


        $stmt1->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $stmt1->fetchAll();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $stmt1->close();

        $stmt1 = null;
    }
    static public function mostrarDatosPDFCamiones()
    {
        # code...
        // $stmt1 = Conexion::conectar()->prepare("SELECT sucursales.nombre,camiones.NOMBRE_CAMION,SUM(mantenimiento.precio) TOTAL, COUNT(camiones.NOMBRE_CAMION) AS mantenimientos_totales FROM mantenimiento INNER JOIN sucursales on mantenimiento.id_sucursal=sucursales.id inner join camiones on mantenimiento.ID_CAMIONES=camiones.ID_CAMIONES GROUP BY sucursales.id,camiones.NOMBRE_CAMION HAVING COUNT(*)>=1");



        $stmt1 = Conexion::conectar()->prepare("SELECT sucursales.nombre, CAMIONES.NOMBRE_CAMION, CAMIONES.TIPO_CAMION, CAMIONES.NUMERO_SERIE, CAMIONES.MODELO, CONDUCTORES.NOMBRE, CONDUCTORES.APELLIDOS  FROM CONDUCTORES INNER JOIN sucursales INNER JOIN CAMIONES ON CAMIONES.ID_CONDUCTORES = CONDUCTORES.ID_CONDUCTORES AND CAMIONES.ID_SUCURSALES = sucursales.id");



        // CAMIONES.ID_SUCURSALES = sucursales.id   = PERTENENCIA CAMION
        // CONDUCTORES.ID_SUCURSALES = sucursales.id    = PERTENENCIA CONDUCTOR
        $stmt1->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $stmt1->fetchAll();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $stmt1->close();

        $stmt1 = null;
    }
}
