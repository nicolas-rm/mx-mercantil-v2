<?php

class ControladorRoles{

	/*=============================================
	MOSTRAR ROLES
	=============================================*/

	static public function ctrMostrarRoles($item, $valor){

		$tabla = "roles";

		$respuesta = ModeloRoles::MdlMostrarRoles($tabla, $item, $valor);

		return $respuesta;
	}

		/*=============================================
	REGISTRO DE ROLES
	=============================================*/

	static public function ctrCrearRol(){

		if(isset($_POST["nuevoRol"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoRol"])){


				$tabla = "roles";

				$datos = array("nombre" => $_POST["nuevoRol"]);

				$respuesta = ModeloRoles::mdlIngresarRol($tabla, $datos);

		
				if($respuesta == "ok"){


					echo '<script>

					swal({

						type: "success",
						title: "¡El Rol ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "roles";

						}

					});
				

					</script>';


				}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El Rol no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "roles";

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
						
							window.location = "roles";

						}

					});
				

					</script>';


			    }
			}
			else{

				echo '<script>

					swal({

						type: "error",
						title: "¡La nombre del rol contiene numeros!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "roles";

						}

					});
				

				</script>';

			}

		}
	}



		/*=============================================
	BORRAR ROL
	=============================================*/

	static public function ctrBorrarRol(){

		if(isset($_GET["idRol"])){

			$tabla ="roles";
			$datos = $_GET["idRol"];

 			$respuesta = ModeloRoles::mdlBorrarRol($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El rol ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "roles";

								}
							})

				</script>';

			}		

		}

	}




		/*=============================================
	REGISTRO DE SUCURSAL
	=============================================*/

	static public function ctrEditarRol(){

		if(isset($_POST["editarRol"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRol"])){


				$tabla = "roles";

				$datos = array("nombre"=>$_POST["editarRol"],
							   "id"=>$_POST["idRol"]);

				$respuesta = ModeloRoles::mdlEditarRol($tabla, $datos);

		
				if($respuesta == "ok"){


					echo '<script>

					swal({

						type: "success",
						title: "¡El Rol ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "roles";

						}

					});
				

					</script>';


				}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El Rol no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "roles";

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
						
							window.location = "roles";

						}

					});
				

					</script>';


			    }
			}
			else{

				echo '<script>

					swal({

						type: "error",
						title: "¡La nombre del rol contiene numeros!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "roles";

						}

					});
				

				</script>';

			}

		}
	}

 

}


	
 

