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
					"NOMBRE" => $_POST["nuevoNombre"],
					"APELLIDOS" => $_POST["nuevoApellidos"],
					"FECHA_NACIMIENTO" => $_POST["nuevoFechaNacimiento"],
					"CURP" => $_POST["nuevoCurp"],
					"DIRECCION" => $_POST["nuevoDireccion"],
					"NUMERO_LICENCIA" => $_POST["nuevoNumeroLicencia"],
					"ANTIGUEDAD" => $_POST["nuevoAntiguedad"],
					"ID_ESTATUS_CONDUCTORES" => $_POST["nuevoEstatusConductores"],
					"ID_SUCURSALES" => $_POST["nuevoSucursalConductores"]
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
				$idSucursal = Condiciones::mdlMostrarUsuarios($_SESSION["id_empleado"]);
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
					' . $value["NOMBRE"] . '
					</td>
					<td>
					' . $value["APELLIDOS"] . '
					</td>
					<td>
					' . $value["FECHA_NACIMIENTO"] . '
					</td>
					<td>
					' . $value["CURP"] . '
					</td>
					<td>
					' . $value["DIRECCION"] . '
					</td>
					<td>
					' . $value["NUMERO_LICENCIA"] . '
					</td>
					<td>
					' . $value["ANTIGUEDAD"] . '
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
				$idSucursal = Condiciones::mdlMostrarUsuarios($_SESSION["id_empleado"]);
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
					' . $value["NOMBRE"] . '
					</td>
					<td>
					' . $value["APELLIDOS"] . '
					</td>
					<td>
					' . $value["FECHA_NACIMIENTO"] . '
					</td>
					<td>
					' . $value["CURP"] . '
					</td>
					<td>
					' . $value["DIRECCION"] . '
					</td>
					<td>
					' . $value["NUMERO_LICENCIA"] . '
					</td>
					<td>
					' . $value["ANTIGUEDAD"] . '
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
				$idSucursal = Condiciones::mdlMostrarUsuarios($_SESSION["id_empleado"]);
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
					' . $value["NOMBRE"] . '
					</td>
					<td>
					' . $value["APELLIDOS"] . '
					</td>
					<td>
					' . $value["FECHA_NACIMIENTO"] . '
					</td>
					<td>
					' . $value["CURP"] . '
					</td>
					<td>
					' . $value["DIRECCION"] . '
					</td>
					<td>
					' . $value["NUMERO_LICENCIA"] . '
					</td>
					<td>
					' . $value["ANTIGUEDAD"] . '
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
			$idSucursal = Condiciones::mdlMostrarUsuarios($_SESSION["id_empleado"]);
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
					' . $value["NOMBRE"] . '
					</td>
					<td>
					' . $value["APELLIDOS"] . '
					</td>
					<td>
					' . $value["FECHA_NACIMIENTO"] . '
					</td>
					<td>
					' . $value["CURP"] . '
					</td>
					<td>
					' . $value["DIRECCION"] . '
					</td>
					<td>
					' . $value["NUMERO_LICENCIA"] . '
					</td>
					<td>
					' . $value["ANTIGUEDAD"] . '
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
	}

	static public function foraneos()
	{ }



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
				"ID_CONDUCTORES" => $_POST["editConductor"],
				"NOMBRE" => $_POST["editNombre"],
				"APELLIDOS" => $_POST["editApellidos"],
				"FECHA_NACIMIENTO" => $_POST["editFechaNacimiento"],
				"CURP" => $_POST["editCurp"],
				"DIRECCION" => $_POST["editDireccion"],
				"NUMERO_LICENCIA" => $_POST["editNumeroLicencia"],
				"ANTIGUEDAD" => $_POST["editAntiguedad"],
				"ID_ESTATUS_CONDUCTORES" => $_POST["editEstatusConductores"],
				"ID_SUCURSALES" => $_POST["editSucursalConductores"]
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
						
						window.location = "conductoresRead";
						
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
