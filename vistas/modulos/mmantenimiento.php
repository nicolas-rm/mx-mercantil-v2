<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Administrar Camiones

    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Camiones</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
 
      <!-- /.col (right) -->
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Camiones Registrados</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" method="post" enctype="multipart/form-data">
            <!-- <div class="box-body"> -->
            <!-- <label>Mostrar Camiones:</label> -->
            <!-- <div class="form-group form-inline">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                  <select class="form-control" id="mostrarConductoresPertenencia" name="mostrarConductoresPertenencia" required>
                    <option value="default" disabled selected>Tipo</option>
                    <option value="1">Todos</option>
                    <option value="2">Local</option>
                    <option value="3">Foraneo</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Mostrar Estatus</button>
              </div> -->
            <!-- </div> -->
          </form>
          <div class="box-body">
            <table class="table table-bordered dt-responsive example">


              <thead>
                <tr>
                 
                  <th>
                    NOMBRE DEL CAMION
                  </th>
                  <th>
                    ENCARGADO
                  </th>
                   
                  <th>
                    ESTATUS
                  </th>
                   
                  <th>
                    Acciones
                  </th>
                </tr>
              </thead>

              <tbody>

                <?php
                $read = new CamionesControlador();
                $read->mostrarCamionesControlador2();
                ?>

              </tbody>

            </table>
          </div>
          <!-- /.box-body -->
        </div>

        <!-- /.box -->
      </div>
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
          <h4 class="modal-title">Editar Vehiculo</h4>
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
                  <label>Nombre:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <input type="text" class="form-control text-uppercase" id="editNombreCamion" name="editNombreCamion" placeholder="Nombre" required>
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
                    <select class="form-control" value="" id="editConductorCamiones" value="" name="editConductorCamiones" required >
                      <option value="default" disabled selected>Conductor</option>
                      <!-- <option value="default">PRUEBA</option> -->
                      <?php
                      // $readStatus = new EstatusControlador();
                      $respuesta = ModeloConductores::mostrarConductorModelo("CONDUCTORES");

                      $value = null;
                      $item = null;

                      $sucursales = ControladorSucursales::ctrMostrarSucursales($value, $item);
                      $status = EstatusModelo::MostrarEstatus("ESTATUS_CONDUCTORES");

                      // $status = $readStatus->mostrarEstatus("ESTATUS_CAMIONES");
                      foreach ($respuesta as $key => $value) {
                        // if ($value["ID_CONDUCTORES"] != "1") {
                        # code...
                        $descripcion = null;
                        foreach ($status as $key => $valor) {
                          if ($value["ID_ESTATUS_CONDUCTORES"] == $valor["ID_ESTATUS_CONDUCTORES"]) {
                            $descripcion = $valor["DESCRIPCION"];
                          }
                        }

                        if ($descripcion == "ACTIVO") {
                          foreach ($sucursales as $key => $vale) {
                            if ($value["ID_SUCURSALES"] == $vale["id"]) {
                              echo '<option value="' . $value["ID_CONDUCTORES"] . '">' . $value["NOMBRE"], " ", $value["APELLIDOS"], " - ", $vale["nombre"] . '</option>';
                            }
                          }
                        }
                        // }
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

 
            <div class="modal-footer">

              <!-- <button type="reset" class="btn btn-danger pull-left" value="Borrar">Cancelar</button> -->

              <button type="submit" class="btn btn-primary">Guardar Vehiculo</button>

            </div>

            <?php
            $insert = new CamionesControlador();
            $insert->actualizarCamionesControlador2();
            ?>


          </div>
      </form>
    </div>


    </form>
  </div>
</div>
</div>
<!--  -->