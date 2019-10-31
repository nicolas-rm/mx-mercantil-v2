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
            }
        }
    }
}
