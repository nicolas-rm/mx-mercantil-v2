<?php


require_once "conexion.php";
class pdfModelo
{

    static public function mostrarDatosPDFMante()
    {
        # code...
        $stmt = Conexion::conectar()->prepare("SELECT sucursales.nombre ,conductores.NOMBRE,mantenimiento.nombre_taller, mantenimiento.kilometraje,mantenimiento.descripcion,mantenimiento.nombre_mecanico,mantenimiento.precio FROM mantenimiento INNER JOIN sucursales on mantenimiento.id_sucursal=sucursales.id inner join camiones on mantenimiento.ID_CAMIONES=camiones.ID_CAMIONES inner join conductores on mantenimiento.ID_CONDUCTORES=conductores.ID_CONDUCTORES");
         

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
