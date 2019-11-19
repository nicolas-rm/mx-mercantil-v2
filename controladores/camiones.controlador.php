<?php

class CamionesControlador
{

	/*=============================================
	REGISTRO DE CONDUCTORES
	=============================================*/

	static public function agregarCamionesControlador()
	{

		if (isset($_POST["nuevoDescripcion"])) {

			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDescripcion"])) {


				$tabla = "CAMIONES";

				$conductor = null;
				if (empty($_POST["nuevoConductorCamiones"])) {
					$conductor = "1";
				} else {
					$conductor = $_POST["nuevoConductorCamiones"];
				}
				$datos = array(
					"DESCRIPCION" => $_POST["nuevoDescripcion"],
					"NUMERO_SERIE" => $_POST["nuevoNumSerie"],
					"NUMERO_PLACAS" => $_POST["nuevoPlacas"],
					"NOMBRE_CAMION" => $_POST["nuevoNombreCamion"],
					"MODELO" => $_POST["nuevoModelo"],
					"TIPO_CAMION" => $_POST["nuevoTipoCamiones"],
					"ID_SUCURSALES" => $_POST["nuevoSucursalConductores"],
					"ID_CONDUCTORES" => $conductor,
					"ESTATUS_CAMIONES" => $_POST["nuevoEstatusCamiones"]
				);

				$respuesta = ModeloCamiones::agregarCamionesModelo($tabla, $datos);


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
							
							window.location = "camiones";

							
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
							window.location = "camiones";

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
						
						window.location = "camiones";
						
						}
						
					});
					
					
                	</script>';

					// var_dump($datos);
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
						
						window.location = "camiones";
						
					}
					
				});
				
				
				</script>';
			}
		}
	}

	static public function mostrarCamionesControlador()
	{
		# code...
		$tabla = "CAMIONES";
		$mostrar = ModeloCamiones::mostrarCamionesModelo($tabla);
		$sucursales = ModeloSucursales::mdlMostrarSucursales("sucursales", "", "");
		$conductor = ModeloConductores::mostrarConductorModelo("CONDUCTORES");

		foreach ($mostrar as $key => $value) {
			$nombre = null;
			# code...
			$encargado = null;
			// if ($value["TIPO_CAMION"] == "Camion") {

				foreach ($sucursales as $key => $vale) {
					# code...
					if ($value["ID_SUCURSALES"] == $vale["id"]) {
						# code...
						$nombre = $vale["nombre"];
					}
				}

				foreach ($conductor as $key => $val) {
					# code...
					if ($value["ID_CONDUCTORES"] == $val["ID_CONDUCTORES"]) {
						# code...
						$encargado = $val["NOMBRE"];
					}
				}
				echo '
					<tr>
						<td>
						' . $value["DESCRIPCION"] . '
						</td>
						<td>
						' . $value["NOMBRE_CAMION"] . '					
						</td>
						<td>
						' . $encargado . '					
						</td>
						<td>';

				if ($value["ESTATUS_CAMIONES"] == "Disponible") {
					echo '<button id="' . $value["ID_CAMIONES"] . '" idConductor="' . $value["ID_CONDUCTORES"] . '" value="" class="btn btn-xs btn-success estatusCamiones">' . $value["ESTATUS_CAMIONES"] . '</button>';
				}
				if ($value["ESTATUS_CAMIONES"] == "Mantenimiento") {
					echo '<button id="' . $value["ID_CAMIONES"] . '" idConductor="' . $value["ID_CONDUCTORES"] . '" value="" class="btn btn-xs btn-warning estatusCamiones">' . $value["ESTATUS_CAMIONES"] . '</button>';
				}
				if ($value["ESTATUS_CAMIONES"] == "Cargado") {
					echo '<button id="' . $value["ID_CAMIONES"] . '" idConductor="' . $value["ID_CONDUCTORES"] . '" value="" class="btn btn-xs btn-primary estatusCamiones">' . $value["ESTATUS_CAMIONES"] . '</button>';
				}
				if ($value["ESTATUS_CAMIONES"] == "Repartiendo") {
					echo '<button id="' . $value["ID_CAMIONES"] . '" idConductor="' . $value["ID_CONDUCTORES"] . '" value="" class="btn btn-xs btn-danger estatusCamiones">' . $value["ESTATUS_CAMIONES"] . '</button>';
				}
				echo '</td>					
						<td>
							' . $value["TIPO_CAMION"] . '
						</td>					
						<td>
		
						  <div class="btn-group">
		
						  <button id="' . $value["ID_CAMIONES"] . '" class="btn btn-primary editCamiones" data-toggle="modal" data-target="#modalEditarCamion"><i class="fa fa-pencil"></i></button>
						  <button id="deletConductor"  class="btn btn-warning" value="' . $value["ID_CONDUCTORES"] . '"><i class="fa fa-times"></i></button>
						  <button id="deletConductor" class="btn btn-danger" value="' . $value["ID_CONDUCTORES"] . '"><i class="fa fa-file-pdf-o"></i></button>
		
						  </div>  
		
						  </td>
					</tr>';
			// }
		}
	}

	static public function actualizarCamionesControlador()
	{
		# code...
		if (isset($_POST["editDescripcion"])) {

			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editDescripcion"])) {


				$tabla = "CAMIONES";

				$conductor = null;
				if (empty($_POST["editConductorCamiones"])) {
					$conductor = "1";
				} else {
					$conductor = $_POST["editConductorCamiones"];
				}
				$datos = array(
					"ID_CAMIONES" => $_POST["editCamiones"],
					"DESCRIPCION" => $_POST["editDescripcion"],
					"NUMERO_SERIE" => $_POST["editNumSerie"],
					"NUMERO_PLACAS" => $_POST["editPlacas"],
					"NOMBRE_CAMION" => $_POST["editNombreCamion"],
					"MODELO" => $_POST["editModelo"],
					"TIPO_CAMION" => $_POST["editTipoCamiones"],
					"ID_SUCURSALES" => $_POST["editSucursalConductores"],
					"ID_CONDUCTORES" => $conductor,
					"ESTATUS_CAMIONES" => $_POST["editEstatusCamiones"]
				);

				$respuesta = ModeloCamiones::updateCamionesModelo($tabla, $datos);


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
							
							window.location = "camiones";

							
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
							window.location = "camiones";

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
						
						window.location = "camiones";
						
						}
						
					});
					
					
                	</script>';

					// var_dump($datos);
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
						
						window.location = "camiones";
						
					}
					
				});
				
				
				</script>';
			}
		}
	}
}
