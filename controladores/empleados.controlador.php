<?php

class ControladorEmpleados{



	static public function ctrMostrarEmpleados($item, $valor){

		$tabla = "empleados";

		$respuesta = ModeloEmpleados::MdlMostrarEmpleados($tabla, $item, $valor);

		return $respuesta;
	}


	static public function ctrCrearEmpleado(){

		if(isset($_POST["nuevoNombreE"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreE"]) &&			  
			   preg_match('/^[0-9]+$/', $_POST["nuevoTelefonoE"])){


				$tabla = "empleados";

				$datos = array("id_sucursal" => $_POST["nuevoSucursal"],
							   "nombre" => $_POST["nuevoNombreE"], 
					           "telefono" => $_POST["nuevoTelefonoE"]);

				$respuesta = ModeloEmpleados::mdlIngresarEmpleado($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Empleado ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "empleados";

						}

					});
				

					</script>';


				}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El Empleado no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "empleado";

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
						
							window.location = "empleados";

						}

					});
				

					</script>';


			    }
			}
		}
	}


			/*=============================================
	BORRAR EMPLEADO
	=============================================*/

	static public function ctrBorrarEmpleado(){

		if(isset($_GET["idEmpleado"])){

			$tabla ="empleados";
			$datos = $_GET["idEmpleado"];

			 			 
			$respuesta = ModeloEmpleados::mdlBorrarEmpleado($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Empleado ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "empleados";

								}
							})

				</script>';

			}		

		}

	}


			/*=============================================
	REGISTRO DE SUCURSAL
	=============================================*/

	static public function ctrEditarEmpleado(){

		if(isset($_POST["editarNombreE"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreE"])){


				$tabla = "empleados";

				$datos = array("id_sucursal" => $_POST["editarSucursal"],
								"nombre"=>$_POST["editarNombreE"],
							    "telefono"=>$_POST["editarTelefonoE"],
							   "id"=>$_POST["idEmpleado"]);

				$respuesta = ModeloEmpleados::mdlEditarEmpleado($tabla, $datos);

		
				if($respuesta == "ok"){


					echo '<script>

					swal({

						type: "success",
						title: "¡El empleado ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "empleados";

						}

					});
				

					</script>';


				}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El empleado no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "empleados";

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
						
							window.location = "empleados";

						}

					});
				

					</script>';


			    }
			}
			else{

				echo '<script>

					swal({

						type: "error",
						title: "¡La nombre del empleado contiene numeros!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "empleados";

						}

					});
				

				</script>';

			}

		}
	}



}


	


