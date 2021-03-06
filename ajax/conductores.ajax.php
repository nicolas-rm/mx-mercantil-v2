<?php
require_once "../controladores/conductores.controlador.php";
require_once "../modelos/conductores.modelo.php";
// require_once "./modelos/conexion.php";

class AjaxConductores
{

	/*=============================================
	EDITAR CONDUCTOR
	=============================================*/

	public $editConductor;

	public function ajaxEditarConductor()
	{

		$valor = $this->editConductor;
		$datos = ConductoresControlador::editarConductorControlador($valor);
		// var_dump($datos);
		// $_POST["ID_ESTATUS_CONDUCTORES"] = $datos["ID_ESTATUS_CONDUCTORES"];
		echo json_encode($datos);
	}

	public function ajaxEditar()
	{

		$valor = $this->editConductor;
		// $datos = ConductoresControlador::editarConductorControlador($valor);
		// var_dump($datos);
		// $_POST["ID_ESTATUS_CONDUCTORES"] = $datos["ID_ESTATUS_CONDUCTORES"];
		return $valor;
	}

	public function eliminarConductor()
	{
		# code...$valor = $this->editConductor;
		$valor = $this->editConductor;
		$datos = ModeloConductores::eliminarConductor("CONDUCTORES",$valor);
		// var_dump($datos);
		// $_POST["ID_ESTATUS_CONDUCTORES"] = $datos["ID_ESTATUS_CONDUCTORES"];
		echo json_encode($datos);
	}
}

/*=============================================
EDITAR USUARIO
=============================================*/


if (isset($_POST["editConductor"])) {

	$editar = new AjaxConductores();
	$editar->editConductor = $_POST["editConductor"];
	$editar->ajaxEditarConductor();
}
if (isset($_POST["delet"])) {

	$editar = new AjaxConductores();
	$editar->editConductor = $_POST["deletConductor"];
	$editar->eliminarConductor();
}
// if (isset($_POST["deletConductor"])) {

// 	$editar = new AjaxConductores();
// 	$editar->editConductor = $_POST["idCamion"];
// 	$editar->eliminarConductor();
// }

// echo '<script> console.log("SI ENTRO AL AJAX"); </script>';
