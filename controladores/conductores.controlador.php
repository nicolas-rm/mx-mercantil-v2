<?php

class ConductoresControlador
{

    /*=============================================
	REGISTRO DE CONDUCTORES
	=============================================*/

    static public function agregarConductorControlador()
    {

        if (isset($_POST["nuevoNombre"])) {

            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])) {


                $tabla = "CONDUCTORES";

                $datos = array(
                    "NOMBRE" => $_POST["nuevoNombre"],
                    "APELLIDOS" => $_POST["nuevoApellidos"],
                    "FECHA_NACIMIENTO" => $_POST["nuevoFechaNacimiento"],
                    "CURP" => $_POST["nuevoCurp"],
                    "DIRECCION" => $_POST["nuevoDireccion"],
                    "NUMERO_LICENCIA" => $_POST["nuevoNumeroLicencia"],
                    "ANTIGUEDAD" => $_POST["nuevoAntiguedad"],
                    "ID_ESTATUS_CONDUCTORES" => $_POST["nuevoEstatusConductores"]
                );

                $respuesta = ModeloConductores::agregarConductorModelo($tabla, $datos);


                if ($respuesta == "ok") {


                    echo '<script>

					swal({

						type: "success",
						title: "Conductor Guardado Correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "conductores";

						}

					});
				

					</script>';
                } else {

                    echo '<script>

					swal({

						type: "error",
						title: "Error En Guardar El Conductor, Revise Los Datos",
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

                if ($respuesta != "ok") {

                    echo '<script>

					swal({

						type: "error",
						title: "¡error con Base de Datos !",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						

						}

					});
				

					</script>';
                }
            } else {

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
}
