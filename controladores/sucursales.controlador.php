<?php

class ControladorSucursales{

	/*=============================================
	MOSTRAR EMPLEADOS
	=============================================*/

	static public function ctrMostrarSucursales($item, $valor){

		$tabla = "sucursales";

		$respuesta = ModeloSucursales::MdlMostrarSucursales($tabla, $item, $valor);

		return $respuesta;
	}

		/*=============================================
	REGISTRO DE SUCURSAL
	=============================================*/

	static public function ctrCrearSucursal(){

		if(isset($_POST["nuevoNombreS"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoTelefonoS"]) &&
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCiudadS"])){

				$tabla = "sucursales";

				$datos = array("nombre" => $_POST["nuevoNombreS"],
							   "telefono" => $_POST["nuevoTelefonoS"],
					           "ciudad" => $_POST["nuevoCiudadS"],
					           "direccion" => $_POST["nuevoDireccionS"]);

				$respuesta = ModeloSucursales::mdlIngresarSucursal($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡Registro guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "sucursales";

						}

					});
				

					</script>';


				}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El registro no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "sucursales";

						}

					});
				

				</script>';

			}

			if($respuesta != "ok"){

					echo '<script>

					swal({

						type: "error",
						title: "¡Error con Base de Datos !",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "sucursales";

						}

					});
				

					</script>';


			    }
			}
			else{

				echo '<script>

					swal({

						type: "error",
						title: "¡Datos incorrectos!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "sucursales";

						}

					});
				

				</script>';

			}

		}
	}




		/*=============================================
	REGISTRO DE SUCURSAL
	=============================================*/

	static public function ctrEditarSucursal(){

		if(isset($_POST["editarNombreS"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreS"])){


				$tabla = "sucursales";

				$datos = array("nombre"=>$_POST["editarNombreS"],
							   "telefono"=>$_POST["editarTelefonoS"],
							   "ciudad"=>$_POST["editarCiudadS"],
							   "direccion"=>$_POST["editarDireccionS"],
							   "id"=>$_POST["idSucursal"]);

				$respuesta = ModeloSucursales::mdlEditarSucursal($tabla, $datos);

		
				if($respuesta == "ok"){


					echo '<script>

					swal({

						type: "success",
						title: "¡Registro guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "sucursales";

						}

					});
				

					</script>';


				}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡La registro no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "sucursales";

						}

					});
				

				</script>';

			}

			if($respuesta != "ok"){

					echo '<script>

					swal({

						type: "error",
						title: "¡Error con Base de Datos !",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "sucursales";

						}

					});
				

					</script>';


			    }
			}
			else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El registro contiene numeros!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "sucursales";

						}

					});
				

				</script>';

			}

		}
	}


		static public function ctrBorrarSucursal(){

		if(isset($_GET["idSucursal"])){

			$tabla ="sucursales";
			$datos = $_GET["idSucursal"];

 			$respuesta = ModeloSucursales::mdlBorrarSucursal($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "¡Registro eliminada correctamente!",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "sucursales";

								}
							})

				</script>';

			}		

		}

	}



}


	


