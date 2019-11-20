<?php

class ViajesControlador
{

    /*=============================================
	REGISTRO DE CONDUCTORES
	=============================================*/

    static public function agregarCamionesControlador()
    {

        if (isset($_POST["nuevoCamionViaje"])) {

            $tabla = "VIAJE";

            $datos = array(
                "ID_CAMIONES" => $_POST["nuevoCamionViaje"],
                "TIPO_VIAJE" => $_POST["nuevoTipoViaje"],
                "CANTIDAD_PEDIDOS" => $_POST["nuevoCantidadPedidos"],
                "MONTO_TOTAL" => $_POST["nuevoTotalPagos"],
                "DESCRIPCION" => $_POST["nuevoRutaViaje"]
            );

            // var_dump($datos);
            $respuesta = ModeloViaje::agregarViajeModelo($tabla, $datos);
        }
    }


    static public function mostrarViajesControlador()
    {
        # code...

        $tabla = "CAMIONES";
        $camiones = ModeloCamiones::mostrarCamionesModelo($tabla);

        $tabla = "VIAJE";
        $viajes = ModeloViaje::mostrarViajeModelo($tabla);
        // $sucursales = ModeloSucursales::mdlMostrarSucursales("sucursales", "", "");
        // $conductor = ModeloConductores::mostrarConductorModelo("CONDUCTORES");

        foreach ($viajes as $key => $value) {
            $nombre = null;
            # code...
            $encargado = null;
            // if ($value["TIPO_CAMION"] == "Camion") {

            foreach ($camiones as $key => $vale) {
                # code...
                if ($vale["ID_CAMIONES"] == $vale["ID_CAMIONES"]) {
                    # code...
                    $nombre = $vale["NOMBRE_CAMION"];
                }
            }

            // foreach ($conductor as $key => $val) {
            //     # code...
            //     if ($value["ID_CONDUCTORES"] == $val["ID_CONDUCTORES"]) {
            //         # code...
            //         $encargado = $val["NOMBRE"];
            //     }
            // }
            echo '
					<tr>
						<td>
						' . $nombre . '
						</td>
						<td>
						' . $value["TIPO_VIAJE"] . '					
						</td>
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
		
						  <button class="btn btn-success viajeEdit"  data-toggle="modal" data-target="#modalEditarConductor"  value=""><i class="fa fa-check"></i></button>
	
					  <button id="deletConductor" class="btn btn-danger viajeCancelar" value=""><i class="fa fa-times"></i></button>
		
						  </div>  
		
						  </td>
					</tr>';
            // }
        }
    }
}
