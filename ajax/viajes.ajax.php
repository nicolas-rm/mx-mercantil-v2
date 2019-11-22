<?php
// require_once "../controladores/pdf.controlador.php";
// require_once "../controladores/estatus.controlador.php";
// require_once "../modelos/pdf.modelo.php";
require_once "../modelos/viaje.modelo.php";
// require_once "./modelos/conexion.php";



class ajaxVIAJE
{
    public $idViaje;


    public function EstatusViaje()
    {

        $id = $this->idViaje;

        // $res = new pdfControlador();
        $respuesta = ModeloViaje::actualizarEstatus("VIAJE",$id,"0");
        echo json_encode($respuesta);
    }
}

if (isset($_POST["EstatusViaje"])) {

    $editar = new ajaxVIAJE();
    $editar->idViaje = $_POST["idViaje"];
    $editar->EstatusViaje();
}
