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
                                      <th>
                                          ANTIGUEDAD
                                      </th>
                                      <th>
                                          ESTATUS
                                      </th>
                                      <th style="width:50px">
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

                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                      <label>Fecha Nacimiento:</label>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                                          <input type="date" class="form-control text-uppercase" value="" id="editFechaNacimiento" value="" name="editFechaNacimiento" placeholder="Fecha Nacimiento" required>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                      <label>Curp:</label>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                                          <input type="text" class="form-control text-uppercase" value="" id="editCurp" value="" name="editCurp" placeholder="Curp" required>
                                      </div>
                                  </div>

                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                      <label>Direccion:</label>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                                          <input type="text" class="form-control text-uppercase" value="" id="editDireccion" value="" name="editDireccion" placeholder="Direccion" required>
                                      </div>
                                  </div>
                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                      <label>Numero Licencia:</label>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                                          <input type="text" class="form-control text-uppercase" value="" id="editNumeroLicencia" value="" name="editNumeroLicencia" placeholder="Numero Licencia" required>
                                      </div>
                                  </div>
                              </div>


                              <div class="row">
                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                      <label>Antiguedad:</label>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                                          <input type="number" class="form-control text-uppercase" value="" id="editAntiguedad" value="" name="editAntiguedad" placeholder="Antiguedad" required>
                                      </div>
                                  </div>

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
  <!--  -->