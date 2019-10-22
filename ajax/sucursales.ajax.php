<?php

require_once "../controladores/sucursales.controlador.php";
require_once "../modelos/sucursales.modelo.php";

class AjaxSucursales{

	/*=============================================
	EDITAR SUCURSAL
	=============================================*/	

	public $idSucursal;

	public function ajaxEditarSucursal(){

		$item = "id"; //obtengo el id a editar
		$valor = $this->idSucursal;

		$respuesta = ControladorSucursales::ctrMostrarSucursales($item, $valor);

		echo json_encode($respuesta);

	}


}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idSucursal"])){

	$editar = new AjaxSucursales();
	$editar -> idSucursal = $_POST["idSucursal"];
	$editar -> ajaxEditarSucursal();

}
