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
						
						
						
					}
					
				});
				
				
				</script>';
			}
		}
	}
	static public function mostrarConductorControlador()
	{
		// header('location:ConductoresEdit');
		/* TABLA DE BASE DE DATOS */
		$tabladb = "CONDUCTORES";
		// $_POST["edit"] == null;
		/* METODO DE LA BASE DE DATOS */
		$respuesta = ModeloConductores::mostrarConductorModelo($tabladb);

		/* FILAS DE LA BASE DE DATOS */
		foreach ($respuesta as $key => $value) {
			echo '
			<tr>
				<td>
				' . $value["NOMBRE"] . '
				</td>
				<td>
				' . $value["APELLIDOS"] . '
				</td>
				<td>
				' . $value["FECHA_NACIMIENTO"] . '
				</td>
				<td>
				' . $value["CURP"] . '"
				</td>
				<td>
				' . $value["DIRECCION"] . '
				</td>
				<td>
				' . $value["NUMERO_LICENCIA"] . '
				</td>
				<td>

                  <div class="btn-group">

                  <button id="editConductor" type="button" class="btn btn-primary editConductor" data-toggle="modal" data-target="#modalEditarConductor" value="' . $value["ID_CONDUCTORES"] . '"><i class="fa fa-pencil"></i></button>

                  <button id="deletConductor" class="btn btn-danger" value="' . $value["ID_CONDUCTORES"] . '"><i class="fa fa-times"></i></button>

                  </div>  

                  </td>
			</tr>';
		}
	}



	static public function editarConductorControlador($editConductor)
	{
		# code...
		echo '...................si entro...........';
		$tabladb = "CONDUCTORES";
		$respuesta = ModeloConductores::editarConductorModelo($editConductor, $tabladb);
		return $respuesta;
	}
}
