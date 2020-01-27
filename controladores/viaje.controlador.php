<?php

class ViajesControlador
{

    /*=============================================
	REGISTRO DE CONDUCTORES
	=============================================*/

    static public function agregarViajeControlador()
    {

        if (isset($_POST["nuevoCamionViaje"])) {

            $tabla = "VIAJE";

            $datos = array(
                "ID_CAMIONES" => strtoupper($_POST["nuevoCamionViaje"]),
                "TIPO_VIAJE" => strtoupper($_POST["nuevoTipoViaje"]),
                "CANTIDAD_PEDIDOS" => strtoupper($_POST["nuevoCantidadPedidos"]),
                "MONTO_TOTAL" => strtoupper($_POST["nuevoTotalPagos"]),
                "DESCRIPCION" => strtoupper($_POST["nuevoRutaViaje"]),
                "FECHA_SALIDA" => strtoupper($_POST["nuevoFechaViaje"]),
                "ESTATUS" => strtoupper("1"),
            );

            date_default_timezone_set('America/Mexico_City');

            $fecha = date('Y-m-d');

            $fechaActual = $_POST["nuevoFechaViaje"];

            if ($fecha == $fechaActual) {
                ModeloCamiones::actualizarCamionesModelo("Repartiendo", $datos["ID_CAMIONES"]);
            } else {
                ModeloCamiones::actualizarCamionesModelo("Cargado", $datos["ID_CAMIONES"]);
            }

            $respuesta = ModeloViaje::agregarViajeModelo($tabla, $datos);
            // var_dump($fecha);
            // var_dump($fechaActual);



                if ($respuesta == "ok") {

                    echo '<script>

                    swal({

                        type: "success",
                        title: "¡Registro guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    }).then((result)=>{

                        if(result.value){
                        
                            window.location = "agenda";

                        }

                    });
                

                    </script>';
                }




            // var_dump($datos);

            // if($datos["TIPO_VIAJE"] == "Local"){
            //     ModeloCamiones::actualizarCamionesModelo("Disponible",$datos["ID_CAMIONES"]);
            // }
        }
    }


    static public function mostrarViajesControlador()
    {
        # code...

        $tabla = "CAMIONES";
        $camiones = ModeloCamiones::mostrarCamionesModelo($tabla);

        $tabla = "VIAJE";
        $viajes = ModeloViaje::datos();
        // $sucursales = ModeloSucursales::mdlMostrarSucursales("sucursales", "", "");
        $conductor = ModeloConductores::mostrarConductorModelo("CONDUCTORES");

        foreach ($viajes as $key => $value) {
            if ($value["ESTATUS"] == "1") {
                echo '
                <tr>
                    <td>
                    ' . $value["NOMBRE_CAMION"] . '
                    </td>
                    <td>
                    ' . $value["NOMBRE"] . '
                    </td>					
                    <td>
                    ' . $value["TELEFONO"] . '
                    </td>	
                    <td>
                    ' . $value["TIPO_VIAJE"] . '					
                    </td>
                    <td>';
                if ($value["ESTATUS_CAMIONES"] == "Disponible") {
                    echo '<button class="btn btn-xs btn-success">' . $value["ESTATUS_CAMIONES"] . '</button>';
                }
                if ($value["ESTATUS_CAMIONES"] == "Mantenimiento") {
                    echo '<button class="btn btn-xs btn-warning">' . $value["ESTATUS_CAMIONES"] . '</button>';
                }
                if ($value["ESTATUS_CAMIONES"] == "Cargado") {
                    echo '<button class="btn btn-xs btn-primary">' . $value["ESTATUS_CAMIONES"] . '</button>';
                }
                if ($value["ESTATUS_CAMIONES"] == "Repartiendo") {
                    echo '<button class="btn btn-xs btn-danger">' . $value["ESTATUS_CAMIONES"] . '</button>';
                }
                echo '</td>
                    <td>
                    ' . $value["CANTIDAD_PEDIDOS"] . '			
                    </td>
                    <td>
                    ' . $value["MONTO_TOTAL"] . '
                    </td>					
                    <td>
                    ' . $value["DESCRIPCION"] . '
                    </td>					
                                    
                    <td>
    
                      <div class="btn-group">
    
                    <button id="viajeFin" idViaje="' . $value["ID_VIAJE"] . '" class="btn btn-success viajeFin" value="' . $value["ID_CAMIONES"] . '" data-toggle="modal" data-target="#modalEditarConductor"  value=""><i class="fa fa-check"></i></button>

                    <button id="viajeFin" idViaje="' . $value["ID_VIAJE"] . '" class="btn btn-danger viajeFin" value="' . $value["ID_CAMIONES"] . '" data-toggle="modal" data-target="#modalEditarConductor"  value=""><i class="fa fa-times"></i></button>

                      </div>  
    
                      </td>
                </tr>';
            }

            // }
        }
    }
}
