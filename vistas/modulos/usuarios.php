  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

     <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar usuarios
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Usuarios</li>
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

                <!-- xxxxxx -->

                <div class="form-group">

                   <label>Empleado a registrar:</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    
                    <select class="form-control text-uppercase" id="nuevoEmpleadoU" name="nuevoEmpleadoU" required>

                    <option value="">Seleccionar Empleado</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $empleados = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

                       foreach ($empleados as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>
                                     
                  </div>
                
                </div>

                <div class="form-group">

                   <label>Rol a asignar:</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    
                    <select class="form-control text-uppercase" id="nuevoRolU" name="nuevoRolU" required>

                    <option value="">Seleccionar Rol</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $roles = ControladorRoles::ctrMostrarRoles($item, $valor);

                       foreach ($roles as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>
                                     
                  </div>
                
                </div>


                <!-- ENTRADA PARA EL USUARIO -->

                <div class="form-group">  
                  <label>Usuario:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                    <input type="text" class="form-control" name="nuevoUsuario" placeholder="requerido" id="nuevoUsuario" required>
                     
                  </div>

                </div>

                 

                <div class="form-group">
                  <label>Contraseña:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                    <input type="password" class="form-control" name="nuevoPassword" placeholder="requerido" required>

                  </div>

                </div>

                <div class="form-group">

                  <div class="panel"><label>SUBIR FOTO:</label></div>

                  <input type="file" class="nuevaFoto" name="nuevaFoto"><br>

                  <center>
                  <p class="help-block">Peso máximo de la foto 2MB</p>

                  <img src="vistas/img/usuarios/default/no-img.jpg" class="img-thumbnail previsualizar" width="100px">

                  </center>

                </div>


                <div class="modal-footer">

                  <!-- <button type="reset" class="btn btn-danger pull-left" value="Borrar">Cancelar</button> -->

                   

                  <button type="submit" class="btn btn-primary">Guardar Usuario</button>

                   

                </div>

                <?php

                $crearUsuario = new ControladorUsuarios();
                $crearUsuario -> ctrCrearUsuario();

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
              <h3 class="box-title">Usuarios agregados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
              <table class="table table-bordered dt-responsive example"> 


                <thead>

                 <tr>

                   <th style="width:200px">Empleado</th>
                   <th style="width:50px">Rol</th>
                   <th style="width:50px">Usuario</th>
                   <th>Foto</th>
                   <th>Estado</th>
                   <th>Acciones</th>

                 </tr> 

               </thead>

               <tbody>

                <?php



                $item = null;
                $valor = null;

                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                foreach ($usuarios as $key => $value){


                   $item = "id";                                                                  //
                   $valor = $value["id_empleado"];                                                // para mostrar el nombre del empleado
                   $empleado_nombre = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);   //

                   $item = "id";                                                                  //
                   $valor = $value["id_rol"];                                                     // para mostrar el nombre del rol
                   $rol_nombre = ControladorRoles::ctrMostrarRoles($item, $valor);                //

                  
                  echo ' <tr>
                  <td>'.$empleado_nombre["nombre"].'</td>
                  <td>'.$rol_nombre["nombre"].'</td>';


                  echo '<td>'.$value["usuario"].'</td>';

                  if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                  }


                  if($value["estado"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                  }

                  echo '<td>

                  <div class="btn-group">

                  <button class="btn btn-primary btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

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

<div id="modalEditarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

                <div class="form-group">

                   <label>Empleado a registrar:</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    
                    <select class="form-control text-uppercase" id="editarEmpleadoU" name="editarEmpleadoU" disabled="true">

                    <option value="">Seleccionar Empleado</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $empleados = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

                       foreach ($empleados as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>
                                     
                  </div>
                
                </div>


                <div class="form-group">

                   <label>Rol a asignar:</label>
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    
                    <select class="form-control text-uppercase" id="editarRolU" name="editarRolU" required>

                    <option value="">Seleccionar Rol</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $roles = ControladorRoles::ctrMostrarRoles($item, $valor);

                       foreach ($roles as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>
                                     
                  </div>
                
                </div>



               <div class="form-group">  
                  <label>Usuario:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                    <input type="text" class="form-control" name="editarUsuario"  id="editarUsuario" readonly>
                     
                  </div>

                </div>

                 

                <div class="form-group">
                  <label>Contraseña:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                    <input type="text" class="form-control" id="editarPassword" name="editarPassword" required>
                    <input type="hidden"  name="idUsuario" id="idUsuario">

                  </div>

                </div>


          </div>
 
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

        <?php

         $editarUsuario = new ControladorUsuarios();
         $editarUsuario -> ctrEditarUsuario();

?> 


      </form>

    </div>

  </div>

</div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 
