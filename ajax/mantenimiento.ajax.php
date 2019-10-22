<?php

require_once "../controladores/mantenimiento.controlador.php";
require_once "../modelos/mantenimiento.modelo.php";

class AjaxMantenimiento{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idMantenimiento;

	public function ajaxEditarMantenimiento(){

		$item = "id"; //obtengo el id a editar
		$valor = $this->idMantenimiento;

		$respuesta = ControladorMantenimientos::ctrMostrarMantenimientos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idMantenimiento"])){

	$editar = new AjaxMantenimiento();
	$editar -> idMantenimiento = $_POST["idMantenimiento"];
	$editar -> ajaxEditarMantenimiento();
}

