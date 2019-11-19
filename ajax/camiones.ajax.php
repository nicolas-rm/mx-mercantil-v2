<?php
// require_once "../controladores/conductores.controlador.php";
require_once "../modelos/camiones.modelo.php";
require_once "../modelos//camiones.modelo.php";
// require_once "./modelos/conexion.php";

class AjaxCamiones
{

    public $estatusEdit;
    public $idCamion;


    public function Estatus()
    {

        $estatus = $this->estatusEdit;
        $id = $this->idCamion;
        $res = ModeloCamiones::actualizarCamionesModelo($estatus,$id);
        echo json_encode($res);
    }
    public function Editar()
    {

        // $estatus = $this->estatusEdit;
        $id = $this->idCamion;
        $res = ModeloCamiones::editarCamionesModelo("CAMIONES",$id);
        echo json_encode($res);
    }

}

if (isset($_POST["valorEstatusActual"])) {
    $editar = new AjaxCamiones();
    $editar->estatusEdit = $_POST["valorEstatusActual"];
    $editar->idCamion = $_POST["idCamion"];
    $editar->Estatus();
}
if (isset($_POST["editCamiones"])) {
    $editar = new AjaxCamiones();
    // $editar->estatusEdit = $_POST["valorEstatusActual"];
    $editar->idCamion = $_POST["idCamion"];
    $editar->Editar();
}

// echo '<script> console.log("SI ENTRO AL AJAX"); </script>';
