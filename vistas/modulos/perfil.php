 


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Perfil de Usuario
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
         
        <li class="active">Perfil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
 

        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">
                

                                         <?php

                $actual = $_SESSION["id"];

                $item = null;
                $valor = null;

                $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

 
                foreach ($usuario as $key => $value){
 
                    if($actual == $value["id"] ){ 


                      $item = "id";
                   $valor = $value["id_empleado"];
                   $empleado_nombre = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

                   

                  echo ' <tr>
                  <td>'.$empleado_nombre["nombre"].'</td>';
 
                

                       
                    }
                 
                  }

                  

                ?> 
              </h3>
              <h5 class="widget-user-desc">
                <?php

                $actual = $_SESSION["id"];

                $item = null;
                $valor = null;

                $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

 
                foreach ($usuario as $key => $value){
 
                    if($actual == $value["id"] ){ 


                      $item = "id";
                   $valor = $value["id_rol"];
                   $empleado_nombre = ControladorRoles::ctrMostrarRoles($item, $valor);

                   

                  echo ' <tr>
                  <td>'.$empleado_nombre["nombre"].'</td>';
 
                

                       
                    }
                 
                  }

                  

                ?>
                  



                </h5>
            </div>
            <div class="widget-user-image">
           <?php

                $actual = $_SESSION["id"];

                $item = null;
                $valor = null;

                $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

 
                foreach ($usuario as $key => $value){
 
                    if($actual == $value["id"] ){ 


                      $item = "id";
                   $valor = $value["id_empleado"];
                   $empleado_nombre = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

                   
 
 
                
            
                   if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/default/anonymous2.png" class="img-thumbnail" width="40px"></td>';

                  }
 
              

                       
                    }
                 
                  }

                  

                ?>  
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Registrado</h5>
                    <span class="description-text">

                         <?php

                $actual = $_SESSION["id"];

                $item = null;
                $valor = null;

                $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

 
                foreach ($usuario as $key => $value){
 
                    if($actual == $value["id"] ){ 


                      $item = "id";
                   $valor = $value["id_empleado"];
                   $empleado_nombre = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

                   

                  echo ' <tr>
                  <td>'.$empleado_nombre["fecha_registro"].'</td>';
 
                

                       
                    }
                 
                  }

                  

                ?> 


                     </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Usuario</h5>
                    <span class="description-text"><?php  echo $_SESSION["usuario"]; ?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Estatus</h5>
                    <span class="description-text">
                      Activo


                      </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>

            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"> </h5>  <!-- poner dato adiccional -->
                    <span class="description-text"> </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"> </h5>
                    <span class="description-text"> </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"> </h5>
                    <span class="description-text"> </span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

  

        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Datos Personales</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
              <?php

                $actual = $_SESSION["id"];

                $item = null;
                $valor = null;

                $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

 
                foreach ($usuario as $key => $value){
 
                    if($actual == $value["id"] ){ 


                      $item = "id";
                   $valor = $value["id_empleado"];
                   $empleado_nombre = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

                   
 
 
                
            
                   if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/default/anonymous2.png" class="img-thumbnail" width="40px"></td>';

                  }
 
              

                       
                    }
                 
                  }

                  

                ?>  
                        <span class="username">
                          <a  ><?php  echo $_SESSION["usuario"]; ?></a>
                           
                        </span>
                     
                  </div>
                  <!-- /.user-block -->

  

                <table class="table table-condensed">
                  <tr>

                    <th style="width:400px">Nombre de Empleado</th>
                     
 

                   <th style="width:400px">Telefono</th>

  
                   
                   <th>Editar</th>
               

                 </tr> 



                 <?php

                $actual = $_SESSION["id"];

                $item = null;
                $valor = null;

                $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

 
                foreach ($usuario as $key => $value){
 
                    if($actual == $value["id"] ){ 


                      $item = "id";
                   $valor = $value["id_empleado"];
                   $empleado_nombre = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

                   

                  echo ' <tr>
                  <td>'.$empleado_nombre["nombre"].'</td>';

                   
                    echo '<td>'.$empleado_nombre["telefono"].'</td>';               
 
 
                  echo '<td>

                  <div class="btn-group">

                  <button class="btn btn-primary btnEditarEmpleado" data-toggle="modal" data-target="#modalEditarEmpleado" idEmpleado="'.$value["id"].'" ><i class="fa fa-pencil"></i></button>


                  </div>  

                  </td>';               

                       
                    }
                 
                  }

                  

                ?>   
              </table>

               <table class="table table-condensed">
                  <tr>
 
                     
                   <th style="width:400px">Contraseña</th>

 

                   <th style="width:400px">Nueva Foto</th>
                    
 
                   
                   <th>Accion</th>
               

                 </tr> 



                 <?php

                $actual = $_SESSION["id"];

                $item = null;
                $valor = null;

                $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

 
                foreach ($usuario as $key => $value){
 
                    if($actual == $value["id"] ){ 


                      $item = "id";
                   $valor = $value["id_empleado"];
                   $empleado_nombre = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

                   

                  echo ' <tr>
                  <td>'.$value["password"].'</td>';
 
                
            
                   if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/default/anonymous2.png" class="img-thumbnail" width="40px"></td>';

                  }
 
                  echo '<td>

                  <div class="btn-group">

                  <button class="btn btn-primary btnEditarUsuario" data-toggle="modal" data-target="#modalEditarUsuario" idUsuario="'.$value["id"].'"><i class="fa fa-pencil"></i></button>


                  </div>  

                  </td>';               

                       
                    }
                 
                  }

                  

                ?>   
              </table>

                                
                <!-- /.post -->
              </div>


              
              
              <!-- /.tab-pane -->

              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>


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

         $editarPerfil = new ControladorEmpleados();
         $editarPerfil -> ctrEditarEmpleadoPerfil();

?> 


      </form>

    </div>

  </div>

</div>

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

                 <div class="form-group">

                  <div class="panel"><label>SUBIR FOTO:</label></div>

                  <input type="file" class="nuevaFoto" name="editarFoto"><br>

                   
                  <p class="help-block">Peso máximo de la foto 2MB</p>

                  <!-- <img src="vistas/img/usuarios/default/no-img.jpg" class="img-thumbnail ver2" width="100px"> -->

                  <input type="hidden" name="fotoActual" id="fotoActual">

                   
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

         $editarUsuarioPerfil = new ControladorUsuarios();
         $editarUsuarioPerfil -> ctrEditarUsuarioPerfil();

?> 


      </form>

    </div>

  </div>

</div>