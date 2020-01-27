<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Administrar Pedidos

    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Pedidos</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <!-- xs (phones), sm (tablets), md (desktops), and lg (larger desktops).-->
        <div class="box box-primary">

          <form role="form" method="post" enctype="multipart/form-data">

            <div class="box-header">
              <h3 class="box-title">Nuevo Pedido</h3>
            </div>

            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Camion:</label>
                    <select class="form-control" id="nuevoCamionViaje" value="" name="nuevoCamionViaje" required>
                      <option value="default" disabled selected>Camion</option>
                      <!-- <option value="default">PRUEBA</option> -->
                      <?php
                      // $readStatus = new EstatusControlador();
                      $respuesta = ModeloCamiones::mostrarCamionesModelo("CAMIONES");
                      // $status = $readStatus->mostrarEstatus("ESTATUS_CAMIONES");
                      foreach ($respuesta as $key => $value) {
                        if ($value["TIPO_CAMION"] == "Camion" && $value["ESTATUS_CAMIONES"] == "Disponible") {
                          # code...
                          echo '<option value="' . $value["ID_CAMIONES"] . '">' . $value["NOMBRE_CAMION"], " - PLACAS ", "(", $value["NUMERO_PLACAS"], ")" . '</option>';
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tipo Viaje:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                      <!-- <input type="text" class="form-control text-uppercase" id="nuevoNumSerie" name="nuevoNumSerie" placeholder="Numero Serie" required> -->
                      <select class="form-control" value="" id="nuevoTipoViaje" value="" name="nuevoTipoViaje" required>
                        <option value="Local">Local</option>
                        <option value="Foraneo">Foraneo</option>
                      </select>

                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Cantidad Pedidos:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                      <input type="text" class="form-control text-uppercase" id="nuevoCantidadPedidos" name="nuevoCantidadPedidos" placeholder="Cantidad Pedidos" required>
                    </div>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group">
                    <label>Pago Total Pedidos:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                      <input type="text" class="form-control text-uppercase" id="nuevoTotalPagos" name="nuevoTotalPagos" placeholder="Pago Total Pedidos" required>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Ruta:</label>

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                      <textarea class="form-control" id="nuevoRutaViaje" name="nuevoRutaViaje" placeholder="requerido" required> </textarea>

                    </div>

                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group">
                    <label>Fecha Salida:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                      <input type="date" class="form-control text-uppercase" id="nuevoFechaViaje" name="nuevoFechaViaje" placeholder="Nombre" required>
                    </div>
                  </div>
                </div>
              </div>



              <!-- <div id="pertenencia" class="col-md-6 hidden">
      <div class="form-group">
        <label>Pertenencia:</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
          <input type="text" class="form-control text-uppercase" id="nuevoPertenencia" name="nuevoPertenencia" placeholder="Sucursal / Area" required>
        </div>
      </div>
    </div> -->

              <div class="modal-footer">

                <!-- <button type="reset" class="btn btn-danger pull-left" value="Borrar">Cancelar</button> -->

                <button id="pedido" type="submit" class="btn btn-primary">Guardar Pedido</button>

              </div>

              <?php
              $insert = new ViajesControlador();
              $insert->agregarViajeControlador();
              ?>


            </div>
          </form>

        </div>
      </div>


      <!-- /.col (right) -->

    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>

<div id="modalEditarCamion" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Conductor</h4>
        </div>
        <div class="modal-body">
          <div class="box-header">
            <form role="form" method="post" enctype="multipart/form-data">
              <span class="box-title">Datos Principales</span>
          </div>

          <input type="hidden" class="form-control" name="editCamiones" id="editCamiones">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Descripcion:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <input type="text" class="form-control text-uppercase" id="editDescripcion" name="editDescripcion" placeholder="EJEM. NISSAN TSURU" required>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Numero Serie:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <input type="text" class="form-control text-uppercase" id="editNumSerie" name="editNumSerie" placeholder="Numero Serie" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Placas:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <input type="text" class="form-control text-uppercase" id="editPlacas" name="editPlacas" placeholder="Placas" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombre:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <input type="text" class="form-control text-uppercase" id="editNombreCamion" name="editNombreCamion" placeholder="Nombre" required>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Modelo:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <input type="text" class="form-control text-uppercase" id="editModelo" name="editModelo" placeholder="Modelo" required>
                  </div>
                </div>
              </div>

              <div class="col-md-6">

                <div id="tipo" class="form-group">
                  <label>Tipo Vehiculo:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <select class="form-control" value="" id="editTipoCamiones" value="" name="editTipoCamiones" required>
                      <option value="default" disabled selected>Tipo Vehiculo</option>
                      <option value="Automovil">Automovil</option>
                      <option value="Camioneta">Camioneta</option>
                      <option value="Camion">Camion</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">

              <div id="editconductor" class="col-md-6">
                <div class="form-group">
                  <label>Conductor:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <select class="form-control" value="" id="editConductorCamiones" value="" name="editConductorCamiones" required>
                      <option value="default" disabled selected>Conductor</option>
                      <!-- <option value="default">PRUEBA</option> -->
                      <?php
                      // $readStatus = new EstatusControlador();
                      $respuesta = ModeloConductores::mostrarConductorModelo("CONDUCTORES");
                      // $status = $readStatus->mostrarEstatus("ESTATUS_CAMIONES");
                      foreach ($respuesta as $key => $value) {
                        if ($value["ID_CONDUCTORES"] != "1") {
                          # code...
                          echo '<option value="' . $value["ID_CONDUCTORES"] . '">' . $value["NOMBRE"], " ", $value["APELLIDOS"] . '</option>';
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <!-- <div id="pertenencia" class="col-md-6 hidden">
                  <div class="form-group">
                    <label>Pertenencia:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                      <input type="text" class="form-control text-uppercase" id="nuevoPertenencia" name="nuevoPertenencia" placeholder="Sucursal / Area" required>
                    </div>
                  </div>
                </div> -->

              <div class="col-md-6">
                <div class="form-group">
                  <label>Estatus:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <select class="form-control" id="editEstatusCamiones" name="editEstatusCamiones" required>
                      <option value="default" disabled selected>Estatus</option>
                      <option value="Disponible">Disponible</option>
                      <option value="Mantenimiento">Mantenimiento</option>
                      <option value="Repartiendo">Repartiendo</option>
                      <option value="Cargado">Cargado</option>
                      <!-- <option value="Disponible" >Disponible</option> -->
                      <!-- <option value="2" >Estatus</option>
                    <option value="3" >Estatus</option>
                    <option value="1" >Estatus</option> -->
                      <!--                     
                    $readStatus = new EstatusControlador();
                    $status = $readStatus->mostrarEstatus("ESTATUS_CAMIONES");
                    foreach ($status as $key => $value) {
                      echo '<option value="' . $value["ID_ESTATUS_CAMIONES"] . '">' . $value["DESCRIPCION"] . '</option>';
                    } -->

                    </select>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sucursal:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <select class="form-control" id="editSucursalConductores" name="editSucursalConductores" required>
                      <option value="default" disabled selected>Sucursal</option>
                      <?php
                      $value = null;
                      $item = null;

                      $sucursales = ControladorSucursales::ctrMostrarSucursales($value, $item);

                      foreach ($sucursales as $key => $value) {
                        echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <!--  <div class="col-md-6">

                </div> -->
            </div>

            <div class="modal-footer">

              <!-- <button type="reset" class="btn btn-danger pull-left" value="Borrar">Cancelar</button> -->

              <button type="submit" class="btn btn-primary">Guardar Roles</button>

            </div>

            <?php
            $insert = new CamionesControlador();
            $insert->actualizarCamionesControlador();
            ?>


          </div>
      </form>
    </div>


    </form>
  </div>
</div>
</div>
<!--  -->