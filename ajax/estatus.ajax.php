<?php
// require_once "../controladores/conductores.controlador.php";
require_once "../modelos//estatus.modelo.php";
// require_once "./modelos/conexion.php";

class AjaxEstatus
{

    public $estatusEdit;
    public $tablaEdit;


    public function Estatus()
    {

        $idEstatus = $this->estatusEdit;
        $tabla = $this->tablaEdit;
        $status = null;
        if ($tabla == "conductores") {
            $status = EstatusModelo::EditarEstatus("ESTATUS_CONDUCTORES","ID_ESTATUS_CONDUCTORES",$idEstatus);
        }else if ($tabla == "camiones") {
            $status = EstatusModelo::EditarEstatus("ESTATUS_CAMIONES","ID_ESTATUS_CAMIONES",$idEstatus);
        }
        echo json_encode($status);
    }
}

/*=============================================
EDITAR USUARIO
=============================================*/


if (isset($_POST["estatusEdit"])) {
    $editar = new AjaxEstatus();
    $editar->estatusEdit = $_POST["estatusEdit"];
    $editar->tablaEdit = $_POST["tablaEdit"];
    $editar->Estatus();
}

// echo '<script> console.log("SI ENTRO AL AJAX"); </script>';
