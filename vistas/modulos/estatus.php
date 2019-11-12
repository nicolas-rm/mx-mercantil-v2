  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Administrar Roles

          </h1>
          <ol class="breadcrumb">
              <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

              <li class="active">Roles</li>
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
                              <h3 class="box-title">Insertar datos</h3>
                          </div>

                          <div class="box-body">

                              <div class="form-group">
                                  <label>Nombre Estatus:</label>

                                  <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                                      <input type="text" class="form-control " id="nuevoEstatusNombre" name="nuevoEstatusNombre" placeholder="Nombre Estatus" required>

                                  </div>

                              </div>
                              <div class="form-group">
                                  <label>Pertenencia Estatus:</label>

                                  <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                                      <select class="form-control" id="nuevoEstatusPertenencia" name="nuevoEstatusPertenencia" required>
                                          <option value="default" disabled selected>Tipo</option>
                                          <option value="1">Camiones</option>
                                          <option value="2">Conductores</option>
                                      </select>

                                  </div>

                              </div>


                              <br>
                              <div class="modal-footer">

                                  <!-- <button type="reset" class="btn btn-danger pull-left" value="Borrar">Cancelar</button> -->

                                  <button type="submit" class="btn btn-primary">Guardar Estatus</button>

                              </div>

                              <?php

                                $creadEstatus = new EstatusControlador();
                                $creadEstatus->agregarEstatus();

                                ?>



                          </div>
                      </form>

                  </div>


              </div>


              <div class="col-md-8">
                  <div class="box box-primary">
                      <div class="box-header">
                          <h3 class="box-title">Roles agregadas</h3>
                      </div>

                      <form role="form" method="post" enctype="multipart/form-data">
                          <div class="box-body">
                              <label>Mostrar Estatus:</label>
                              <div class="form-group form-inline">
                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                                      <select class="form-control" id="mostrarEstatusPertenencia" name="mostrarEstatusPertenencia" required>
                                          <option value="default" disabled selected>Tipo</option>
                                          <option value="1">Todos</option>
                                          <option value="2">Conductores</option>
                                          <option value="3">Camiones</option>
                                      </select>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Mostrar Estatus</button>
                              </div>
                          </div>
                      </form>
                      <table class="table table-bordered dt-responsive example">
                          <thead>
                              <tr>
                                  <th>
                                      #
                                  </th>
                                  <th>
                                      Descripcion
                                  </th>
                                  <th>
                                      Estatus
                                  </th>
                                  <th>
                                      Tipo Estatus
                                  </th>
                                  <th>
                                      Acciones
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                $mostrar = new EstatusControlador();
                                $mostrar->mostrarEstatusTabla();
                                ?>
                          </tbody>
                      </table>
                  </div>
                  <!-- /.box-body -->
              </div>

              <!-- /.box -->
          </div>
          <!-- /.col (right) -->

          <!-- /.row -->

      </section>
      <!-- /.content -->
  </div>

  <div id="modalEditarEstatus" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <form role="form" method="post" enctype="multipart/form-data">
                  <div class="modal-header" style="background:#3c8dbc; color:white">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Editar Estatus</h4>
                  </div>
                  <div class="modal-body">
                      <form role="form" method="post" enctype="multipart/form-data">
                          <div class="box-header">
                              <span class="box-title">Datos Principales</span>
                          </div>

                          <div class="box-body">
                              <input type="hidden" class="form-control text-uppercase" value="" id="editEstatus" value="" name="editEstatus" required>

                              <div class="form-group">
                                  <label>Nombre Estatus:</label>

                                  <div class="input-group">

                                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                                      <input type="text" class="form-control " id="editEstatusNombre" name="editEstatusNombre" placeholder="Nombre Estatus" required>

                                  </div>

                              </div>
                              <div class="form-group">
                                  <label>Pertenencia Estatus:</label>

                                  <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-podcast"></i></span>
                                      <select class="form-control" id="editEstatusPertenencia" name="editEstatusPertenencia" required>
                                          <option value="default" disabled selected>Tipo</option>
                                          <option value="1">Camiones</option>
                                          <option value="2">Conductores</option>
                                      </select>

                                  </div>

                              </div>

                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                              <button type="submit" class="btn btn-primary">Actualizar Conductor</button>
                          </div>
                          <?php

                            $edit = new EstatusControlador();
                            $edit->actualizarEstatus();

                            ?>
                      </form>
                  </div>


              </form>
          </div>
      </div>
  </div>
  <!--=====================================
MODAL EDITAR ROL
======================================-->