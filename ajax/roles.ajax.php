<?php

require_once "../controladores/roles.controlador.php";
require_once "../modelos/roles.modelo.php";

class AjaxRoles{

 
 	/*=============================================
	VALIDAR NO REPETIR ROL
	=============================================*/	


	public $validarRol;

	public function ajaxValidarRol(){

		$item = "nombre";
		$valor = $this->validarRol;

		$respuesta = ControladorRoles::ctrMostrarRoles($item, $valor);

		echo json_encode($respuesta);

	}


		/*=============================================
	EDITAR ROL
	=============================================*/	

	public $idRol;

	public function ajaxEditarRol(){

		$item = "id";
		$valor = $this->idRol;

		$respuesta = ControladorRoles::ctrMostrarRoles($item, $valor);

		echo json_encode($respuesta);

	}
}


// ----------------------------------------------------------------------------------------------------------------

/*=============================================
VALIDAR NO REPETIR ROL
=============================================*/

if(isset( $_POST["validarRol"])){

	$valRol = new AjaxRoles();
	$valRol -> validarRol = $_POST["validarRol"];
	$valRol -> ajaxValidarRol();

}


/*=============================================
EDITAR ROL
=============================================*/
if(isset($_POST["idRol"])){

	$editar = new AjaxRoles();
	$editar -> idRol = $_POST["idRol"];
	$editar -> ajaxEditarRol();

}