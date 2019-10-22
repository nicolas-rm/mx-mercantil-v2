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

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreS"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoTelefonoS"]) &&
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
						title: "¡La Sucursal ha sido guardada correctamente!",
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
						title: "¡La Sucursal no puede ir vacío o llevar caracteres especiales!",
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
						title: "¡error con Base de Datos !",
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
						title: "¡La nombre de la Sucursal contiene numeros!",
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



}


	


