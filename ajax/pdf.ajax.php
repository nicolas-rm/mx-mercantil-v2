<?php
require_once "../controladores/pdf.controlador.php";
require_once "../controladores/estatus.controlador.php";
require_once "../modelos/pdf.modelo.php";
require_once "../modelos/estatus.modelo.php";
// require_once "./modelos/conexion.php";



class ajaxPDF
{
    public $idCamiones;


    public function pdfConductores()
    {
        $res = new pdfControlador();
        $respuesta = $res->mostrarDatosPDF();
        echo json_encode($respuesta);
    }
    public function pdfCamionesUnique()
    {
		$id = $this->idCamiones;
        $res = new pdfControlador();
        $respuesta = $res->mostrarDatosPDFUnique($id);
        echo json_encode($respuesta);
    }

    public function pdfMantenimientoUnique()
    {
		$id = $this->idCamiones;
        $res = new pdfControlador();
        $respuesta = $res->mostrarDatosMantenimientoUnique($id);
        echo json_encode($respuesta);
    }
}

if (isset($_POST["PDFJS"])) {

    $editar = new AjaxPDF();
    $editar->pdfConductores();
}


if (isset($_POST["unique"])) {

    $editar = new AjaxPDF();
    $editar -> idCamiones = $_POST["idPDFCamionesUnique"];
    $editar->pdfCamionesUnique();
}


if (isset($_POST["PDFMANTENIMIENTO"])) {

    $editar = new AjaxPDF();
    $editar -> idCamiones = $_POST["idPDFmantenimientoUnique"];
    $editar->pdfMantenimientoUnique();
}
