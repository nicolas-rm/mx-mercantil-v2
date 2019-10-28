<?php
require_once "controladores/conductores.controlador.php";
require_once "modelos/conductores.modelo.php";

class AjaxConductores
{

	/*=============================================
	EDITAR CONDUCTOR
	=============================================*/

	public $editConductor;

	public function ajaxEditarConductor()
	{
		// $editConductor = $this->editConductor;
		// $respuesta = ConductoresControlador::editarConductorControlador($editConductor);
		$id = $this->editConductor;
		$respuesta = new ConductoresControlador();
		$respuesta -> editarConductorControlador($id);
		// $respuesta = "hola tio como estas";
		echo json_encode($respuesta);
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

// echo '<script> console.log("SI ENTRO AL AJAX"); </script>';
