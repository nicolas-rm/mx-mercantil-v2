  <!-- Content Wrapper. Contains page content -->
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



    <section class="content" style="height: max-content;">

      <div class="row">
        <div>
          <!-- xs (phones), sm (tablets), md (desktops), and lg (larger desktops).-->
          <div class="box box-primary">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="box-header">
                <!-- <h3 class="box-title"> -->
                <span class="box-title">Datos Principales</span>
              </div>

              <div class="box-body">

                <div class="row">
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <label>Nombre:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                      <input type="text" class="form-control text-uppercase" id="nuevoNombre" name="nuevoNombre" placeholder="Nombre" required>
                    </div>
                    <!-- <input required type="text" name="nombreCOI" class="form-control mb-4" placeholder="Nombre"> -->
                  </div>

                  <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <!-- <input required type="text" name="apCOI" class="form-control mb-4" placeholder="Apellido Patero" /> -->
                    <label>Apellidos:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                      <input type="text" class="form-control text-uppercase" id="nuevoApellidos" name="nuevoApellidos" placeholder="Apellidos" required>
                    </div>
                  </div>

                  <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <!-- <input required type="text" name="amCOI" class="form-control mb-4" placeholder="Apellido Materno" /> -->
                    <label>Fecha Nacimiento:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                      <input type="date" class="form-control text-uppercase" id="nuevoFechaNacimiento" name="nuevoFechaNacimiento" placeholder="Fecha Nacimiento" required>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <label>Curp:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                      <input type="text" class="form-control text-uppercase" id="nuevoCurp" name="nuevoCurp" placeholder="Curp" required>
                    </div>
                  </div>

                  <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <!-- <input required type="text" name="apCOI" class="form-control mb-4" placeholder="Apellido Patero" /> -->
                    <label>Direccion:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                      <input type="text" class="form-control text-uppercase" id="nuevoDireccion" name="nuevoDireccion" placeholder="Direccion" required>
                    </div>
                  </div>

                  <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <!-- <input required type="text" name="amCOI" class="form-control mb-4" placeholder="Apellido Materno" /> -->
                    <label>Numero Licencia:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                      <input type="text" class="form-control text-uppercase" id="nuevoNumeroLicencia" name="nuevoNumeroLicencia" placeholder="Numero Licencia" required>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <label>Antiguedad:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                      <input type="number" class="form-control text-uppercase" id="nuevoAntiguedad" name="nuevoAntiguedad" placeholder="Antiguedad" required>
                    </div>
                  </div>

                  <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <!-- <input required type="text" name="apCOI" class="form-control mb-4" placeholder="Apellido Patero" /> -->
                    <label>Estatus:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                      <select class="form-control" id="nuevoEstatusConductores" name="nuevoEstatusConductores" required>
                        <option value="default" disabled selected>Estatus</option>
                        <?php
                        $status = EstatusModelo::MostrarEstatus("ESTATUS_CONDUCTORES");

                        foreach ($status as $key => $value) {
                          if ($value["DESCRIPCION"] != "INACTIVO") {
                            echo '<option value="' . $value["ID_ESTATUS_CONDUCTORES"] . '">' . $value["DESCRIPCION"] . '</option>';
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>


                </div>

                <div class="modal-body">

                  <!-- <button type="reset" class="btn btn-danger pull-left" value="Borrar">Cancelar</button> -->

                  <button type="submit" class="btn btn-primary pull-right">Guardar Mantenimientos</button>

                </div>
              </div>
              <!-- <div class="modal-footer col-md-12 pull-right">
                <button type="submit" class="btn btn-primary pull-right">Guardar Conductor</button>

              </div> -->



              <?php
              $insert = new ConductoresControlador();
              $insert->agregarConductorControlador();
              ?>
            </form>
          </div>
        </div>
        <!-- /.col (right) -->

      </div>
      <!-- /.row -->
      <div class="row">
        <div class="">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Roles agregadas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered dt-responsive example">
                <thead>
                  <tr>
                    <th>
                      NOMBRE
                    </th>
                    <th>
                      APELLIDOS
                    </th>
                    <th>
                      FECHA NACIMIENTO
                    </th>
                    <th>
                      CURP
                    </th>
                    <th>
                      DIRECCION
                    </th>
                    <th>
                      NUMERO LICENCIA
                    </th>
                    <th style="width:50px">Acciones</th>
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
      </div>
    </section>

    <!-- <section class="content"> -->

    <!-- </section> -->
    <!-- /.content -->
  </div>

  <div id="modalEditarConductor" class="modal fade" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar Conductor</h4>

          </div>

          <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

          <div class="modal-body">

            <form role="form" method="post" enctype="multipart/form-data">
              <div class="box-header">
                <!-- <h3 class="box-title"> -->
                <span class="box-title">Datos Principales</span>
              </div>

              <div class="box-body">




              </div>
              <!-- <div class="modal-footer col-md-12 pull-right">
                <button type="submit" class="btn btn-primary pull-right">Guardar Conductor</button>

              </div> -->

            </form>

          </div>

          <!--=====================================
        PIE DEL MODAL
        ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Actualizar Conductor</button>

          </div>


        </form>

      </div>

    </div>

  </div>