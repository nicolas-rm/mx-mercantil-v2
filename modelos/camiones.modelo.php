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
}
