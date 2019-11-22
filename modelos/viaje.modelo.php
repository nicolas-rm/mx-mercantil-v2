<?php

require_once "conexion.php";

class ModeloViaje
{

    /*=============================================
	REGISTRAR CONDUCTORES
	=============================================*/

    static public function agregarViajeModelo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ID_CAMIONES, TIPO_VIAJE, CANTIDAD_PEDIDOS, MONTO_TOTAL, DESCRIPCION, FECHA_SALIDA, ESTATUS) VALUES(:ID_CAMIONES, :TIPO_VIAJE, :CANTIDAD_PEDIDOS, :MONTO_TOTAL, :DESCRIPCION, :FECHA_SALIDA, :ESTATUS)");

        $stmt->bindParam(":ID_CAMIONES", $datos["ID_CAMIONES"], PDO::PARAM_INT);
        $stmt->bindParam(":TIPO_VIAJE", $datos["TIPO_VIAJE"], PDO::PARAM_STR);
        $stmt->bindParam(":CANTIDAD_PEDIDOS", $datos["CANTIDAD_PEDIDOS"], PDO::PARAM_STR);
        $stmt->bindParam(":MONTO_TOTAL", $datos["MONTO_TOTAL"], PDO::PARAM_STR);
        $stmt->bindParam(":DESCRIPCION", $datos["DESCRIPCION"], PDO::PARAM_STR);
        $stmt->bindParam(":FECHA_SALIDA", $datos["FECHA_SALIDA"], PDO::PARAM_STR);
        $stmt->bindParam(":ESTATUS", $datos["ESTATUS"], PDO::PARAM_INT);
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


    static public function datos()
    {
        # code...
        $stmt = Conexion::conectar()->prepare("SELECT T2.ID_CAMIONES, T2.NOMBRE_CAMION, T1.TIPO_VIAJE, T1.CANTIDAD_PEDIDOS, T1.MONTO_TOTAL, T1.DESCRIPCION, T3.NOMBRE, T3.TELEFONO, T2.ESTATUS_CAMIONES, T1.ESTATUS, T1.ID_VIAJE FROM VIAJE AS T1 INNER JOIN CAMIONES AS T2 INNER JOIN CONDUCTORES AS T3 INNER JOIN sucursales AS T4 ON T1.ID_CAMIONES = T2.ID_CAMIONES AND T2.ID_CONDUCTORES = T3.ID_CONDUCTORES AND T3.ID_SUCURSALES = T4.id");
        $stmt->execute();

        /* RETORNO DE TODA LA CONSULTA GENERADA POR LA QUERY */
        return $stmt->fetchAll();

        /* CERRAR LA CONEXION DE LA CONSULTA */
        $stmt->close();

        $stmt = null;
    }


    static public function actualizarEstatus($tabla, $id, $estatus)
    {
        # code...
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ESTATUS = '0' WHERE ID_VIAJE = :ID_VIAJE");
        // $stmt->bindParam(":ESTATUS", $estatus, PDO::PARAM_STR);
        $stmt->bindParam(":ID_VIAJE", $id, PDO::PARAM_STR);
        if ($stmt->execute()) {
            /* RESPUESTA POR SI TODO SALIO BIEN */
            return "ok";
        } else {
            /* RESPUESTA POR SI TODO SALIO MAL*/
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}
