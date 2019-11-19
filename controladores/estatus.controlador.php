<?php

class EstatusControlador
{

    /* MOSTRAR ESTATUS */
    static public function mostrarEstatus($table)
    {
        $status = EstatusModelo::MostrarEstatus($table);
        // var_dump($status);
        return $status;
    }

    static public function agregarEstatus()
    {
        if (isset($_POST["nuevoEstatusNombre"])) {
            $datosControlador = array("DESCRIPCION" => $_POST["nuevoEstatusNombre"], "ESTATUS" => "1");
            if ($_POST["nuevoEstatusPertenencia"] == "1") {
                $tabladb = "ESTATUS_CAMIONES";
                $respuesta = EstatusModelo::AgregarEstatus($datosControlador, $tabladb);
            } else if ($_POST["nuevoEstatusPertenencia"] == "2") {
                $tabladb = "ESTATUS_CONDUCTORES";
                $respuesta = EstatusModelo::AgregarEstatus($datosControlador, $tabladb);
            } else {

                echo '<script>

					swal({

						type: "error",
						title: "Error En La Inserccion De Datos, Verifique los Datos Insertados.",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{
						if(result.value){
                            window.location = "estatus";
						}

					});
				

				</script>';
            }
            if ($respuesta == "bien") {
                echo '<script>

					swal({

						type: "success",
						title: "Estatus Creado Correctamente.",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
						}

					});
				

					</script>';
            } else {
                echo '<script>

					swal({

						type: "error",
						title: "Estatus No Creado.",
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

    public function mostrarEstatusTabla()
    {
        # code...
        if (isset($_POST["mostrarEstatusPertenencia"])) {
            if ($_POST["mostrarEstatusPertenencia"] == "1") {
                # code...
                $tableid = null;

                $statusConductores = EstatusModelo::MostrarEstatus("ESTATUS_CONDUCTORES");
                $statusCamiones = EstatusModelo::MostrarEstatus("ESTATUS_CAMIONES");

                foreach ($statusConductores as $key => $value) {
                    $tableid++;
                    /* CONVERSION DE DATOS DEL ESTATUS */
                    $estatus = null;
                    if ($value["ESTATUS"] == 1) {
                        $estatus = "ACTIVO";
                    } else {
                        $estatus = "INACTIVO";
                    }
                    /* CODIGO HTML EN PHP VISUALIZAR LAS FILAS DE LOS DATOS DE LAS TABLAS */
                    echo '
                    <tr>
                        <td>' . $tableid . '</td>
                        <td>' . $value["DESCRIPCION"] . '</td>
                        <td>' . $estatus . '</td>
                        <td>' . "CONDUCTORES" . '</td>    
                        <td>
                            <div class="btn-group">
                                <button id="estatusEdit" data="conductores" data-toggle="modal" data-target="#modalEditarEstatus" value="' . $value["ID_ESTATUS_CONDUCTORES"] . '" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </div>  
                        </td>    
                    </tr>';
                }
                foreach ($statusCamiones as $key => $value) {
                    $tableid++;
                    /* CONVERSION DE DATOS DEL ESTATUS */
                    $estatus = null;
                    if ($value["ESTATUS"] == 1) {
                        $estatus = "ACTIVO";
                    } else {
                        $estatus = "INACTIVO";
                    }
                    /* CODIGO HTML EN PHP VISUALIZAR LAS FILAS DE LOS DATOS DE LAS TABLAS */
                    echo '
                    <tr>
                        <td>' . $tableid . '</td>
                        <td>' . $value["DESCRIPCION"] . '</td>
                        <td>' . $estatus . '</td>
                        <td>' . "CAMIONES" . '</td>
                        <td>
                            <div class="btn-group">
                            <button id="estatusEdit" data="camiones" data-toggle="modal" data-target="#modalEditarEstatus" value="' . $value["ID_ESTATUS_CAMIONES"] . '" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </div>  
                        </td>
                    </tr>';
                }
            } else if ($_POST["mostrarEstatusPertenencia"] == "2") {
                # code...
                $statusConductores = EstatusModelo::MostrarEstatus("ESTATUS_CONDUCTORES");
                foreach ($statusConductores as $key => $value) {
                    // $tableid++;
                    /* CONVERSION DE DATOS DEL ESTATUS */
                    $estatus = null;
                    if ($value["ESTATUS"] == 1) {
                        $estatus = "ACTIVO";
                    } else {
                        $estatus = "INACTIVO";
                    }
                    /* CODIGO HTML EN PHP VISUALIZAR LAS FILAS DE LOS DATOS DE LAS TABLAS */
                    echo '<tr>
                    <td>' . ($key + 1) . '</td>
                    <td>' . $value["DESCRIPCION"] . '</td>
                    <td>' . $estatus . '</td>
                    <td>' . "CONDUCTORES" . '</td>
                    <td>
                        <div class="btn-group">
                            <button id="estatusEdit" data="conductores" data-toggle="modal" data-target="#modalEditarEstatus" value="' . $value["ID_ESTATUS_CONDUCTORES"] . '" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
					  </div>  
                        </td>    
                    
                </tr>';
                }
            } else if ($_POST["mostrarEstatusPertenencia"] == "3") {
                # code...
                $statusCamiones = EstatusModelo::MostrarEstatus("ESTATUS_CAMIONES");
                foreach ($statusCamiones as $key => $value) {
                    // $tableid++;
                    /* CONVERSION DE DATOS DEL ESTATUS */
                    $estatus = null;
                    if ($value["ESTATUS"] == 1) {
                        $estatus = "ACTIVO";
                    } else {
                        $estatus = "INACTIVO";
                    }
                    /* CODIGO HTML EN PHP VISUALIZAR LAS FILAS DE LOS DATOS DE LAS TABLAS */
                    echo '
                    <tr>
                        <td>' . ($key + 1) . '</td>
                        <td>' . $value["DESCRIPCION"] . '</td>
                        <td>' . $estatus . '</td>
                        <td>' . "CAMIONES" . '</td>
                        <td>
                            <div class="btn-group">
                                <button id="estatusEdit" data="camiones" data-toggle="modal" data-target="#modalEditarEstatus" value="' . $value["ID_ESTATUS_CAMIONES"] . '" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </div>  
                        </td>    
                    </tr>';
                }
            }
        } else {
            $tableid = null;

            $statusConductores = EstatusModelo::MostrarEstatus("ESTATUS_CONDUCTORES");
            $statusCamiones = EstatusModelo::MostrarEstatus("ESTATUS_CAMIONES");

            foreach ($statusConductores as $key => $value) {
                $tableid++;
                /* CONVERSION DE DATOS DEL ESTATUS */
                $estatus = null;
                if ($value["ESTATUS"] == 1) {
                    $estatus = "ACTIVO";
                } else {
                    $estatus = "INACTIVO";
                }
                /* CODIGO HTML EN PHP VISUALIZAR LAS FILAS DE LOS DATOS DE LAS TABLAS */
                echo
                    '<tr>
                    <td>' . $tableid . '</td>
                    <td>' . $value["DESCRIPCION"] . '</td>
                    <td>' . $estatus . '</td>
                    <td>' . "CONDUCTORES" . '</td>
                    <td>
                        <div class="btn-group">
                            <button id="estatusEdit" data="conductores" data-toggle="modal" data-target="#modalEditarEstatus" value="' . $value["ID_ESTATUS_CONDUCTORES"] . '" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </div>  
                    </td>
                </tr>';
            }
            foreach ($statusCamiones as $key => $value) {
                $tableid++;
                /* CONVERSION DE DATOS DEL ESTATUS */
                $estatus = null;
                if ($value["ESTATUS"] == 1) {
                    $estatus = "ACTIVO";
                } else {
                    $estatus = "INACTIVO";
                }
                /* CODIGO HTML EN PHP VISUALIZAR LAS FILAS DE LOS DATOS DE LAS TABLAS */
                echo '
            <tr>
                <td>' . $tableid . '</td>
                <td>' . $value["DESCRIPCION"] . '</td>
                <td>' . $estatus . '</td>
                <td>' . "CAMIONES" . '</td>
                <td>
                    <div class="btn-group">
                        <button id="estatusEdit" data="camiones" data-toggle="modal" data-target="#modalEditarEstatus" value="' . $value["ID_ESTATUS_CAMIONES"] . '" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </div>  
                </td>
            </tr>';
            }
        }
    }

    static public function actualizarEstatus()
    {
        if (isset($_POST["editEstatusNombre"])) {
            if ($_POST["editEstatusPertenencia"] == "1") {
                $datosControlador = null;
                $datosControlador = array("ID_ESTATUS_CAMIONES" => $_POST["editEstatus"], "DESCRIPCION" => $_POST["editEstatusNombre"], "ESTATUS" => "1", "ID_SUCURSALES" => $_POST["editEstatusPertenencia"]);

                $tabladb = "ESTATUS_CAMIONES";

                $respuesta = EstatusModelo::actualizarEstatusModelo($datosControlador, $tabladb);
            } else if ($_POST["editEstatusPertenencia"] == "2") {
                $datosControlador = null;

                $datosControlador = array("ID_ESTATUS_CONDUCTORES" => $_POST["editEstatus"], "DESCRIPCION" => $_POST["editEstatusNombre"], "ESTATUS" => "1", "ID_SUCURSALES" => $_POST["editEstatusPertenencia"]);

                $tabladb = "ESTATUS_CONDUCTORES";

                $respuesta = EstatusModelo::actualizarEstatusModelo($datosControlador, $tabladb);
            } else {

                echo '<script>

					swal({

						type: "error",
						title: "Error En La Inserccion De Datos, Verifique los Datos Insertados.",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{
						if(result.value){
                            window.location = "estatus";
						}

					});
				

				</script>';
            }
            if ($respuesta == "ok") {
                echo '<script>

					swal({

						type: "success",
						title: "Estatus Creado Correctamente.",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
						}

					});
				

					</script>';
            } else {
                echo '<script>

					swal({

						type: "error",
						title: "Estatus No Creado.",
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
}
