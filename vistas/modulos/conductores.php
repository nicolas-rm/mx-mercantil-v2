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



    <section class="content">

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
                        <option value="1">Inactivo</option>
                        <option value="2">Activo</option>
                      </select>
                    </div>
                  </div>


                </div>

              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar Conductor</button>

              </div>

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

    </section>
    <!-- /.content -->
  </div>