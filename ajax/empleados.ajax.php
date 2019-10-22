<?php

require_once "../controladores/empleados.controlador.php";
require_once "../modelos/empleados.modelo.php";

class AjaxEmpleados{

 	/*=============================================
	EDITAR ROL
	=============================================*/	

	public $idEmpleado;

	public function ajaxEditarEmpleado(){

		$item = "id";
		$valor = $this->idEmpleado;

		$respuesta = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

		echo json_encode($respuesta);

	}
}


// ----------------------------------------------------------------------------------------------------------------

 /*=============================================
EDITAR ROL
=============================================*/
if(isset($_POST["idEmpleado"])){

	$editar = new AjaxEmpleados();
	$editar -> idEmpleado = $_POST["idEmpleado"];
	$editar -> ajaxEditarEmpleado();

}