<?php
require_once "../controladores/pdf.controlador.php";
require_once "../controladores/estatus.controlador.php";
require_once "../modelos/pdf.modelo.php";
require_once "../modelos/estatus.modelo.php";
// require_once "./modelos/conexion.php";

class ajaxPDF
{
    public function pdfMante()
    {
        $res = new pdfControlador();
        $respuesta = $res->mostrarDatosPDF();
        echo json_encode($respuesta);
    }
}

if (isset($_POST["PDFJS"])) {

    $editar = new AjaxPDF();
    $editar->pdfMante();
}
