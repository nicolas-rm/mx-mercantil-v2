<?php
require_once "../controladores/pdf.controlador.php";
require_once "../controladores/estatus.controlador.php";
require_once "../modelos/pdf.modelo.php";
require_once "../modelos/estatus.modelo.php";
// require_once "./modelos/conexion.php";

class ajaxPDF
{

    /*=============================================
	EDITAR CONDUCTOR
	=============================================*/

    // public $PDFJS;

    public function pdf()
    {

        // $valor = $this->PDFJS;
        // $datos = pdfModelo::mostrarDatosPDF("CONDUCTORES");
        // $status = EstatusModelo::MostrarEstatus("ESTATUS_CONDUCTORES");

        // $res = [];
        // // $res[] = $datos
        // foreach ($datos as $key => $value) {
        //     // $descripcion = null;
        //     foreach ($status as $val => $valor) {
        //         # code...
        //         if ($value["ID_ESTATUS_CONDUCTORES"] == $valor["ID_ESTATUS_CONDUCTORES"]) {
        //             # code...
        //             $value["ID_ESTATUS_CONDUCTORES"] = $valor["DESCRIPCION"];

        //             // $datos[""]
        //         }
        //     }
        //     // if ($value["ID_ESTATUS_CONDUCTORES"] = "INACTIVO") {
        //         $res[$key] = $value;
        //     // }
        // }
        // var_dump($datos);
        // $_POST["ID_ESTATUS_CONDUCTORES"] = $datos["ID_ESTATUS_CONDUCTORES"];



        // header('location:ConductoresEdit');
        /* TABLA DE BASE DE DATOS */
        $tabladb = "CONDUCTORES";
        // $_POST["edit"] == null;
        /* METODO DE LA BASE DE DATOS */
        $respuesta = pdfModelo::mostrarDatosPDF($tabladb);
        // $pdf = pdfModelo::mostrarDatosPDF($tabladb);
        // $status = EstatusModelo::MostrarEstatus("ESTATUS_CONDUCTORES");
        // /* FILAS DE LA BASE DE DATOS */
        // $res = [];
        // foreach ($respuesta as $key => $value) {
        //     $descripcion = null;
        //     foreach ($status as $val => $valor) {
        //         # code...
        //         if ($value["ID_ESTATUS_CONDUCTORES"] === $valor["ID_ESTATUS_CONDUCTORES"]) {
        //             # code...
        //             // $respuesta["ID_ESTATUS_CONDUCTORES"] = $valor["DESCRIPCION"];
        //             $value["ID_ESTATUS_CONDUCTORES"] = $valor["DESCRIPCION"];
        //         }
        //     }

        //     // if ($value["ID_ESTATUS_CONDUCTORES"] != "inactivo" || $descripcion != "INACTIVO" || $value["ID_ESTATUS_CONDUCTORES"] != "INACTIVO") {
        //         $res[] = $value;
        //     // }
        // }


        echo json_encode($respuesta);
    }
}

/*=============================================
EDITAR USUARIO
=============================================*/


if (isset($_POST["PDFJS"])) {

    $editar = new AjaxPDF();
    $editar->pdf();
}

// echo '<script> console.log("SI ENTRO AL AJAX"); </script>';
