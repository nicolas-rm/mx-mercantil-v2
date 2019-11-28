<?php

class ControladorMantenimientos{	

	/*=============================================
	MOSTRAR ROLES
	=============================================*/

	static public function ctrMostrarMantenimientos($item, $valor){

		$tabla = "mantenimiento";

		$respuesta = ModeloMantenimientos::MdlMostrarMantenimientos($tabla, $item, $valor);

		return $respuesta;
	}

		/*=============================================
	REGISTRO DE ROLES
	=============================================*/

	static public function ctrCrearMantenimiento(){

		if(isset($_POST["nuevoNombreTaller"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreTaller"])){


				$tabla = "mantenimiento";

				$datos = array("id_sucursal" => $_POST["nuevoSucursal"],
					"ID_CONDUCTORES" => $_POST["nuevoConductor"],
					"ID_CAMIONES" => $_POST["nuevoCamion"],
					"nombre_taller" => $_POST["nuevoNombreTaller"],
					"kilometraje" => $_POST["nuevoKilometraje"],
					"descripcion" => $_POST["nuevoDescripcion"],
					"nombre_mecanico" => $_POST["nuevoNombreMecanico"],
					"precio" => $_POST["nuevoCosto"]);

				$respuesta = ModeloMantenimientos::mdlIngresarMantenimiento($tabla, $datos);
                ModeloCamiones::actualizarCamionesModelo("Mantenimiento", $datos["ID_CAMIONES"]);

				if($respuesta == "ok"){


					echo '<script>

					swal({

						type: "success",
						title: "¡El mantenimiento ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "mantenimiento";

						}

					});
				

					</script>';


				}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El mantenimiento no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "mantenimiento";

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
						
							window.location = "mantenimiento";

						}

					});
				

					</script>';


			    }
			}
			else{

				echo '<script>

					swal({

						type: "error",
						title: "¡La mantenimiento del rol contiene numeros!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "mantenimiento";

						}

					});
				

				</script>';

			}

		}
	}
/*=============================================
	REGISTRO DE SUCURSAL
	=============================================*/

	static public function ctrEditarMantenimiento(){

		if(isset($_POST["editarDescripcion"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])){


				$tabla = "mantenimiento";


				$datos = array("id_sucursal" => $_POST["editarSucursal"],
					"ID_CONDUCTORES" => $_POST["editarConductor"],
					"ID_CAMIONES" => $_POST["editarCamion"],
					"nombre_taller" => $_POST["editarNombreTaller"],
					"kilometraje" => $_POST["editarkilometraje"],
					"descripcion" => $_POST["editarDescripcion"],
					"nombre_mecanico" => $_POST["editarNombreMecanico"],
					"precio" => $_POST["editarCosto"],
					"id"=>$_POST["idMantenimiento"]
			);

				$respuesta = ModeloMantenimientos::mdlEditarMantenimiento($tabla, $datos);

		
				if($respuesta == "ok"){


					echo '<script>

					swal({

						type: "success",
						title: "¡El mantenimiento ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "mantenimiento";

						}

					});
				

					</script>';


				}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El mantenimiento no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "mantenimiento";

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
						
							window.location = "mantenimiento";

						}

					});
				

					</script>';


			    }
			}
			else{

				echo '<script>

					swal({

						type: "error",
						title: "¡La nombre del mantenimiento contiene numeros!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "mantenimiento";

						}

					});
				

				</script>';

			}

		}
	}
}