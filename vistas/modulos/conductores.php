<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Administrar Conductores

    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Conductores</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-4">
        <!-- xs (phones), sm (tablets), md (desktops), and lg (larger desktops).-->

        <div class="box box-primary">

          <form role="form" method="post" enctype="multipart/form-data">

            <div class="box-header">
              <h3 class="box-title">Datos Principales</h3>
            </div>

            <div class="box-body">
              <div class="form-group">
                <label>Nombre:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                  <input type="text" class="form-control text-uppercase" id="nuevoNombre" name="nuevoNombre" placeholder="Nombre" required>
                </div>
              </div>

              <div class="form-group">
                <label>Apellidos:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                  <input type="text" class="form-control text-uppercase" id="nuevoApellidos" name="nuevoApellidos" placeholder="Apellidos" required>
                </div>
              </div>

              <div class="form-group">
                <label>Telefono:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                  <input type="text" class="form-control text-uppercase" id="nuevoTelefono" name="nuevoTelefono" placeholder="Apellidos" required>
                </div>
              </div>

              <div class="form-group">
                <label>Licencia:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                  <input type="text" class="form-control text-uppercase" id="nuevoNumeroLicencia" name="nuevoNumeroLicencia" placeholder="Numero Licencia" required>
                </div>
              </div>

              <div class="form-group">
                <label>Estatus:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                  <select class="form-control" id="nuevoEstatusConductores" name="nuevoEstatusConductores" required>
                    <option value="default" disabled selected>Estatus</option>
                    <?php
                    $status = EstatusModelo::MostrarEstatus("ESTATUS_CONDUCTORES");

                    foreach ($status as $key => $value) {
                      if ($value["DESCRIPCION"] != "INACTIVO") {
                        if ($value["DESCRIPCION"] == "Activo" || $value["DESCRIPCION"] == "ACTIVO") {
                          echo '<option selected value="' . $value["ID_ESTATUS_CONDUCTORES"] . '">' . $value["DESCRIPCION"] . '</option>';
                        } else {
                          echo '<option value="' . $value["ID_ESTATUS_CONDUCTORES"] . '">' . $value["DESCRIPCION"] . '</option>';
                        }
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Sucursal:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                  <select class="form-control" id="nuevoSucursalConductores" name="nuevoSucursalConductores" required>
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


              <div class="modal-footer">

                <!-- <button type="reset" class="btn btn-danger pull-left" value="Borrar">Cancelar</button> -->

                <button type="submit" class="btn btn-primary">Guardar Conductor</button>

              </div>

              <?php
              $insert = new ConductoresControlador();
              $insert->agregarConductorControlador();
              ?>


            </div>
          </form>

        </div>


      </div>


      <div class="col-md-8">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Conductores Registrados</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="box-body">
              <label>Mostrar Conductores:</label>
              <div class="form-group form-inline">
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
              </div>
            </div>
          </form>
          <div class="box-body">
            <table class="table table-bordered dt-responsive example">


              <thead>
                <tr>
                  <th>
                    NOMBRE
                  </th>
                  <th>
                    TELEFONO
                  </th>
                  <th>
                    LICENCIA
                  </th>
                  <th>
                    ESTATUS
                  </th>
                  <th>
                    SUCURSAL
                  </th>
                  <th>
                    Acciones
                  </th>
                </tr>
              </thead>

              <tbody>

                <?php
                $read = new ConductoresControlador();
                $read->mostrarConductorControlador();
                ?>

              </tbody>

            </table>
          </div>
          <!-- /.box-body -->
        </div>

        <!-- /.box -->
      </div>
      <!-- /.col (right) -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!--  -->

<div id="modalEditarConductor" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Conductor</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="box-header">
              <span class="box-title">Datos Principales</span>
            </div>

            <div class="box-body">

              <input type="hidden" class="form-control text-uppercase" value="" id="editConductor" value="" name="editConductor" required>

              <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <label>Nombre:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <input type="text" class="form-control text-uppercase" value="" id="editNombre" value="" name="editNombre" placeholder="Nombre" required>
                  </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <label>Apellidos:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <input type="text" class="form-control text-uppercase" value="" id="editApellidos" value="" name="editApellidos" placeholder="Apellidos" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <label>Telefono:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <input type="text" class="form-control text-uppercase" value="" id="editTelefono" value="" name="editTelefono" placeholder="Numero Licencia" required>
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <label>Licencia:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <input type="text" class="form-control text-uppercase" value="" id="editNumeroLicencia" value="" name="editNumeroLicencia" placeholder="Numero Licencia" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <label>Estatus:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                    <select class="form-control" value="" id="editEstatusConductores" value="" name="editEstatusConductores" required>
                      <option value="default" disabled selected>Estatus</option>
                      <?php
                      $readStatus = new EstatusControlador();
                      $status = $readStatus->mostrarEstatus("ESTATUS_CONDUCTORES");
                      foreach ($status as $key => $value) {
                        echo '<option value="' . $value["ID_ESTATUS_CONDUCTORES"] . '">' . $value["DESCRIPCION"] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
              <button type="submit" class="btn btn-primary">Actualizar Conductor</button>
            </div>

            <?php
            $editar = new ConductoresControlador();
            $editar->actualizarConductorControlador();
            ?>
          </form>
        </div>


      </form>
    </div>
  </div>
</div>