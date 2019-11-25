<?php

class ConductoresControlador
{

	/*=============================================
	REGISTRO DE CONDUCTORES
	=============================================*/
	public $editConductor;
	static public function agregarConductorControlador()
	{

		if (isset($_POST["nuevoNombre"])) {

			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])) {


				$tabla = "CONDUCTORES";

				$datos = array(
					"NOMBRE" => strtoupper($_POST["nuevoNombre"]),
					"APELLIDOS" => strtoupper($_POST["nuevoApellidos"]),
					"TELEFONO" => strtoupper($_POST["nuevoTelefono"]),
					"NUMERO_LICENCIA" => strtoupper($_POST["nuevoNumeroLicencia"]),
					"ID_ESTATUS_CONDUCTORES" => strtoupper($_POST["nuevoEstatusConductores"]),
					"ID_SUCURSALES" => strtoupper($_POST["nuevoSucursalConductores"])
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

		if (isset($_POST["mostrarConductoresPertenencia"])) {
			if ($_POST["mostrarConductoresPertenencia"] == "1") {
				# code...
				$tabladb = "CONDUCTORES";
				// $_POST["edit"] == null;
				/* METODO DE LA BASE DE DATOS */
				$respuesta = ModeloConductores::mostrarConductorModelo($tabladb);
				$status = EstatusModelo::MostrarEstatus("ESTATUS_CONDUCTORES");
				$sucursales = ModeloSucursales::mdlMostrarSucursales("sucursales", "", "");
				/* FILAS DE LA BASE DE DATOS */
				$idSucursal = Condiciones::mdlMostrarUsuarios($_SESSION["id"]);
				// $_SESSION["ID_SUCURSAL"] = $idSucursal["id_sucursal"];
				foreach ($respuesta as $key => $value) {
					$descripcion = null;
					$nombre = null;
					foreach ($status as $val => $valor) {
						# code...
						if ($value["ID_ESTATUS_CONDUCTORES"] == $valor["ID_ESTATUS_CONDUCTORES"]) {
							# code...
							$descripcion = $valor["DESCRIPCION"];
						}
					}

					foreach ($sucursales as $key => $vale) {
						# code...
						if ($value["ID_SUCURSALES"] == $vale["id"]) {
							# code...
							$nombre = $vale["nombre"];
						}
					}

					if ($descripcion != "inactivo" && $descripcion != "INACTIVO") {
						echo '
				<tr>
					<td>
					' . $value["NOMBRE"], " ", $value["APELLIDOS"] . '
					</td>
					<td>
					' . $value["TELEFONO"] . '
					</td>
					<td>
					' . $value["NUMERO_LICENCIA"] . '
					</td>
					
					<td>
					' . $descripcion . '
					</td>
					<td>
					' . $nombre . '
					</td>
					<td>
	
					  <div class="btn-group">
	
					  <button class="btn btn-primary editConductor"  data-toggle="modal" data-target="#modalEditarConductor"  value="' . $value["ID_CONDUCTORES"] . '"><i class="fa fa-pencil"></i></button>
	
					  <button id="deletConductor" class="btn btn-danger" value="' . $value["ID_CONDUCTORES"] . '"><i class="fa fa-times"></i></button>
	
					  </div>  
	
					  </td>
				</tr>';
					}
				}
			} else if ($_POST["mostrarConductoresPertenencia"] == "2") {
				# code...
				$tabladb = "CONDUCTORES";
				// $_POST["edit"] == null;
				/* METODO DE LA BASE DE DATOS */
				$respuesta = ModeloConductores::mostrarConductorModelo($tabladb);
				$status = EstatusModelo::MostrarEstatus("ESTATUS_CONDUCTORES");
				$sucursales = ModeloSucursales::mdlMostrarSucursales("sucursales", "", "");
				/* FILAS DE LA BASE DE DATOS */
				$idSucursal = Condiciones::mdlMostrarUsuarios($_SESSION["id"]);
				// $_SESSION["ID_SUCURSAL"] = $idSucursal["id_sucursal"];
				foreach ($respuesta as $key => $value) {
					$descripcion = null;
					$nombre = null;
					foreach ($status as $val => $valor) {
						# code...
						if ($value["ID_ESTATUS_CONDUCTORES"] == $valor["ID_ESTATUS_CONDUCTORES"]) {
							# code...
							$descripcion = $valor["DESCRIPCION"];
						}
					}

					foreach ($sucursales as $key => $vale) {
						# code...
						if ($value["ID_SUCURSALES"] == $vale["id"]) {
							# code...
							$nombre = $vale["nombre"];
						}
					}

					if (
						$descripcion != "inactivo" && $descripcion != "INACTIVO"
						&& $value["ID_SUCURSALES"] == $idSucursal["id_sucursal"]
					) {
						echo '
				<tr>
				<td>
					' . $value["NOMBRE"], " ", $value["APELLIDOS"] . '
					</td>
				<td>
					' . $value["TELEFONO"] . '
					</td>
				<td>
				' . $value["NUMERO_LICENCIA"] . '
				</td>
				
				<td>
				' . $descripcion . '
				</td>
				<td>
				' . $nombre . '
				</td>
					<td>
	
					  <div class="btn-group">
	
					  <button class="btn btn-primary editConductor"  data-toggle="modal" data-target="#modalEditarConductor"  value="' . $value["ID_CONDUCTORES"] . '"><i class="fa fa-pencil"></i></button>
	
					  <button id="deletConductor" class="btn btn-danger" value="' . $value["ID_CONDUCTORES"] . '"><i class="fa fa-times"></i></button>
	
					  </div>  
	
					  </td>
				</tr>';
					}
				}
			} else if ($_POST["mostrarConductoresPertenencia"] == "3") {
				# code...
				$tabladb = "CONDUCTORES";
				// $_POST["edit"] == null;
				/* METODO DE LA BASE DE DATOS */
				$respuesta = ModeloConductores::mostrarConductorModelo($tabladb);
				$status = EstatusModelo::MostrarEstatus("ESTATUS_CONDUCTORES");
				$sucursales = ModeloSucursales::mdlMostrarSucursales("sucursales", "", "");
				/* FILAS DE LA BASE DE DATOS */
				$idSucursal = Condiciones::mdlMostrarUsuarios($_SESSION["id"]);
				// $_SESSION["ID_SUCURSAL"] = $idSucursal["id_sucursal"];
				foreach ($respuesta as $key => $value) {
					$descripcion = null;
					$nombre = null;
					foreach ($status as $val => $valor) {
						# code...
						if ($value["ID_ESTATUS_CONDUCTORES"] == $valor["ID_ESTATUS_CONDUCTORES"]) {
							# code...
							$descripcion = $valor["DESCRIPCION"];
						}
					}

					foreach ($sucursales as $key => $vale) {
						# code...
						if ($value["ID_SUCURSALES"] == $vale["id"]) {
							# code...
							$nombre = $vale["nombre"];
						}
					}

					if (
						$descripcion != "inactivo" && $descripcion != "INACTIVO"
						&& $value["ID_SUCURSALES"] != $idSucursal["id_sucursal"]
					) {
						echo '
				<tr>
				<td>
					' . $value["NOMBRE"], " ", $value["APELLIDOS"] . '
					</td>
				<td>
					' . $value["TELEFONO"] . '
					</td>
				<td>
				' . $value["NUMERO_LICENCIA"] . '
				</td>
				
				<td>
				' . $descripcion . '
				</td>
				<td>
				' . $nombre . '
				</td>
					<td>
	
					  <div class="btn-group">
	
					  <button class="btn btn-primary editConductor"  data-toggle="modal" data-target="#modalEditarConductor"  value="' . $value["ID_CONDUCTORES"] . '"><i class="fa fa-pencil"></i></button>
	
					  <button id="deletConductor" class="btn btn-danger" value="' . $value["ID_CONDUCTORES"] . '"><i class="fa fa-times"></i></button>
	
					  </div>  
	
					  </td>
				</tr>';
					}
				}
			}
		} else {

			$tabladb = "CONDUCTORES";
			// $_POST["edit"] == null;
			/* METODO DE LA BASE DE DATOS */
			$respuesta = ModeloConductores::mostrarConductorModelo($tabladb);
			$status = EstatusModelo::MostrarEstatus("ESTATUS_CONDUCTORES");
			$sucursales = ModeloSucursales::mdlMostrarSucursales("sucursales", "", "");
			/* FILAS DE LA BASE DE DATOS */
			$idSucursal = Condiciones::mdlMostrarUsuarios($_SESSION["id"]);
			// $_SESSION["ID_SUCURSAL"] = $idSucursal["id_sucursal"];
			foreach ($respuesta as $key => $value) {
				$descripcion = null;
				$nombre = null;
				foreach ($status as $val => $valor) {
					# code...
					if ($value["ID_ESTATUS_CONDUCTORES"] == $valor["ID_ESTATUS_CONDUCTORES"]) {
						# code...
						$descripcion = $valor["DESCRIPCION"];
					}
				}

				foreach ($sucursales as $key => $vale) {
					# code...
					if ($value["ID_SUCURSALES"] == $vale["id"]) {
						# code...
						$nombre = $vale["nombre"];
					}
				}

				if (
					$descripcion != "inactivo" && $descripcion != "INACTIVO"
				) {
					echo '
				<tr>
				<td>
				' . $value["NOMBRE"], " ", $value["APELLIDOS"] . '				
				</td>
				<td>
					' . $value["TELEFONO"] . '
					</td>
				<td>
				' . $value["NUMERO_LICENCIA"] . '
				</td>
				
				<td>
				' . $descripcion . '
				</td>
				<td>
				' . $nombre . '
				</td>
					<td>
	
					  <div class="btn-group">
	
					  <button class="btn btn-primary editConductor"  data-toggle="modal" data-target="#modalEditarConductor"  value="' . $value["ID_CONDUCTORES"] . '"><i class="fa fa-pencil"></i></button>
	
					  <button class="btn btn-danger deletConductor" value="' . $value["ID_CONDUCTORES"] . '"><i class="fa fa-times"></i></button>
	
					  </div>  
	
					  </td>
				</tr>';
				}
			}
		}
	}

	static public function editarConductorControlador($editConductor)
	{
		# code...
		// echo '...................si entro...........';
		// $_POST[$editConductor] = $editConductor;

		// $editConductor = '<script> document.write(idMantenimiento) </script>';
		// $id = null;
		$edit = new AjaxConductores();
		$id = $edit->ajaxEditar();

		// var_dump($id);
		// echo '<script> console.log("valor de ese id: " + id); </script>';
		$tabladb = "CONDUCTORES";
		$respuesta = ModeloConductores::editarConductorModelo($tabladb, $editConductor);
		return $respuesta;
	}

	static public function actualizarConductorControlador()
	{
		if (isset($_POST["editNombre"])) {
			/* DATOS ENVIADOS Y ALMACENA EN UN ARRAY CON LOS NOMBRES DE LA BASE DE DATOS */
			$datosControlador = array(
				"ID_CONDUCTORES" => strtoupper($_POST["editConductor"]),
				"NOMBRE" => strtoupper($_POST["editNombre"]),
				"APELLIDOS" => strtoupper($_POST["editApellidos"]),
				"TELEFONO" => strtoupper($_POST["editTelefono"]),
				"NUMERO_LICENCIA" => strtoupper($_POST["editNumeroLicencia"]),
				"ID_ESTATUS_CONDUCTORES" => strtoupper($_POST["editEstatusConductores"]),
				"ID_SUCURSALES" => strtoupper($_POST["editSucursalConductores"])
			);

			/* TABLA DE BASE DE DATOS */
			$tabladb = "CONDUCTORES";

			/* METODO DE LA BASE DE DATOS */
			$respuesta = ModeloConductores::actualizarConductorModelo($datosControlador, $tabladb);

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
			}
			/* RESPUESTA DEL METODO DE LA BASE DE DATOS */
			// if ($respuesta == "bien") {
			// 	header("location:ConductoresRead");
			// } else {
			// 	echo "Error En la edicion de datos de datos";
			// 	// echo "<br/>";
			// }
		}
	}
}
