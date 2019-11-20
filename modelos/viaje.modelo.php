<?php

require_once "conexion.php";

class ModeloViaje
{

    /*=============================================
	REGISTRAR CONDUCTORES
	=============================================*/

    static public function agregarViajeModelo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ID_CAMIONES, TIPO_VIAJE, CANTIDAD_PEDIDOS, MONTO_TOTAL, DESCRIPCION) VALUES(:ID_CAMIONES, :TIPO_VIAJE, :CANTIDAD_PEDIDOS, :MONTO_TOTAL, :DESCRIPCION)");

        $stmt->bindParam(":ID_CAMIONES", $datos["ID_CAMIONES"], PDO::PARAM_INT);
        $stmt->bindParam(":TIPO_VIAJE", $datos["TIPO_VIAJE"], PDO::PARAM_STR);
        $stmt->bindParam(":CANTIDAD_PEDIDOS", $datos["CANTIDAD_PEDIDOS"], PDO::PARAM_STR);
        $stmt->bindParam(":MONTO_TOTAL", $datos["MONTO_TOTAL"], PDO::PARAM_STR);
        $stmt->bindParam(":DESCRIPCION", $datos["DESCRIPCION"], PDO::PARAM_STR);
        // $stmt->bindParam(":TIPO_CAMION", $datos["TIPO_CAMION"], PDO::PARAM_STR);
        // $stmt->bindParam(":ESTATUS_CAMIONES", $datos["ESTATUS_CAMIONES"], PDO::PARAM_STR);
        // $stmt->bindParam(":ID_CONDUCTORES", $datos["ID_CONDUCTORES"], PDO::PARAM_STR);
        // $stmt->bindParam(":ID_SUCURSALES", $datos["ID_SUCURSALES"], PDO::PARAM_STR);
        // $stmt->bindParam(":ID_ESTATUS_CAMIONES", $datos["ID_ESTATUS_CAMIONES"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            // var_dump($datos);
            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mostrarViajeModelo($tabla)
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
}
