<?php
require_once "../controladores/conductores.controlador.php";
require_once "../modelos/conductores.modelo.php";
// require_once "./modelos/conexion.php";

class AjaxEstatus
{

    public $estatusEdit;
    public $tablaEdit;

    public function ajaxEstatus()
    {

        $idEstatus = $this->estatusEdit;
        $tabla = $this->tablaEdit;
        $status = EstatusModelo::MostrarEstatus("CONDUCTORES");
        echo json_encode($status);
    }

    public function ajaxEditar()
    {

        $valor = $this->estatusEdit;
        // $datos = ConductoresControlador::editarConductorControlador($valor);
        // var_dump($datos);
        // $_POST["ID_ESTATUS_CONDUCTORES"] = $datos["ID_ESTATUS_CONDUCTORES"];
        return $valor;
    }
}

/*=============================================
EDITAR USUARIO
=============================================*/


if (isset($_POST["estatusEdit"])) {
    $editar = new AjaxEstatus();
    $editar->estatusEdit = $_POST["estatusEdit"];
    $editar->tablaEdit = $_POST["tablaEdit"];
    $editar->ajaxEstatus();
}

// echo '<script> console.log("SI ENTRO AL AJAX"); </script>';
