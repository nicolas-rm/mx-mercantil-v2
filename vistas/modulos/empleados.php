  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Empleados
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Empleados</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-4"> <!-- xs (phones), sm (tablets), md (desktops), and lg (larger desktops).-->

          <div class="box box-primary">

            <form role="form" method="post" enctype="multipart/form-data">

              <div class="box-header">
                <h3 class="box-title">Insertar datos</h3>
              </div>

              <div class="box-body">

                <div class="form-group">
                  <label>Nombre(s):</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control text-uppercase" name="nuevoNombreE" placeholder="requerido" required="">

                  </div>

                </div>


                 <div class="form-group">

                   <label>Procedencia:</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                    
                    <select class="form-control text-uppercase" id="nuevoSucursal" name="nuevoSucursal" required>

                    <option value="">Seleccionar Sucursal</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $sucursales = ControladorSucursales::ctrMostrarSucursales($item, $valor);

                       foreach ($sucursales as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>
                    
                            <span class="input-group-addon"><a href="sucursales" class="btn btn-success btn-xs">Agregar Sucursal</a></span>


                                     
                  </div>
                
                </div>



                <div class="form-group">
                  <label>Telefono:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                    <input type="number" class="form-control" name="nuevoTelefonoE" placeholder="requerido" required="">

                  </div>

                </div>


                <div class="modal-footer">

                  <button type="submit" class="btn btn-primary">Guardar Sucursal</button>

                </div>

                <?php

                $crearEmpleado = new ControladorEmpleados();
                $crearEmpleado -> ctrCrearEmpleado();

                ?>

              </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div> 
        <!-- /.col (left) -->
        
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Empleados agregadas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
              <table class="table table-bordered dt-responsive example"> 

                <thead>

                 <tr>



                   <th style="width:230px">Nombre</th>
                    
                   <th style="width:130px">Procedencia</th>
                   <th>Telefono</th>
                   
                   <th>Acciones</th>


                 </tr> 

               </thead>

               <tbody>

                 <?php



                $item = null;
                $valor = null;

                $empleados = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

                foreach ($empleados as $key => $value){

                  

                  echo ' <tr>
                  <td>'.$value["nombre"].'</td>';

                   $item = "id";
                   $valor = $value["id_sucursal"];
                   $sucur_nombre = ControladorSucursales::ctrMostrarSucursales($item, $valor);

                   echo '<td>'.$sucur_nombre["nombre"].'</td>';

                  echo '<td>'.$value["telefono"].'</td>';


                  echo '<td>

                  <div class="btn-group">

                  <button class="btn btn-primary btnEditarEmpleado" data-toggle="modal" data-target="#modalEditarEmpleado" idEmpleado="'.$value["id"].'" ><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'" ><i class="fa fa-times"></i></button>

                  </div>  

                  </td>';

                    

                }

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


<!--=====================================
MODAL EDITAR ROL
======================================-->

<div id="modalEditarEmpleado" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar empleado</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

                <div class="form-group">
                  <label>Nombre(s):</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="editarNombreE" name="editarNombreE"  required >

                    <input type="hidden"  name="idEmpleado" id="idEmpleado">

                  </div>

                </div>

                  <div class="form-group">

                   <label>Procedencia:</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                    
                    <select class="form-control text-uppercase" id="editarSucursal" name="editarSucursal" required>

                    <option value="">Seleccionar Sucursal</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $sucursales = ControladorSucursales::ctrMostrarSucursales($item, $valor);

                       foreach ($sucursales as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>
                    
                            


                                     
                  </div>
                
                </div>



                <div class="form-group">
                  <label>Telefono:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                    <input type="number" class="form-control" id="editarTelefonoE" name="editarTelefonoE" >

                  </div>

                </div>


          </div>
 
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar empleado</button>

        </div>

        <?php

         $editarEmpleado = new ControladorEmpleados();
         $editarEmpleado -> ctrEditarEmpleado();

?> 


      </form>

    </div>

  </div>

</div>


<?php

  $borrarEmpleado = new ControladorEmpleados();
  $borrarEmpleado -> ctrBorrarEmpleado();

?> 
