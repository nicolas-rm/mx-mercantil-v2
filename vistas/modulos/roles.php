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
        <div class="col-md-4"> <!-- xs (phones), sm (tablets), md (desktops), and lg (larger desktops).-->

          <div class="box box-primary">

            <form role="form" method="post" enctype="multipart/form-data">

              <div class="box-header">
                <h3 class="box-title">Insertar datos</h3>
              </div>

              <div class="box-body">

                <div class="form-group">
                  <label>Nombre:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span> 

                    <input type="text" class="form-control " id="nuevoRol" name="nuevoRol" placeholder="requerido" required>

                  </div>

                </div>


                <br>
                <div class="modal-footer">

                  <!-- <button type="reset" class="btn btn-danger pull-left" value="Borrar">Cancelar</button> -->

                  <button type="submit" class="btn btn-primary">Guardar Roles</button>

                </div>

                <?php

                $crearRol = new ControladorRoles();
                $crearRol -> ctrCrearRol();

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
            <!-- /.box-header -->
            <div class="box-body"> 
              <table class="table table-bordered dt-responsive example"> 


                <thead>

                 <tr>
 
                   <th style="width:500px">Nombre</th>

                   <th  style="width:50px">Acciones</th>

                 </tr> 

               </thead>

                  <tbody>

                    <?php

                    $item = null;
                    $valor = null;

                    $roles = ControladorRoles::ctrMostrarRoles($item, $valor);

                      foreach ($roles as $key => $value){
         
                           echo ' <tr>
                   
                   
                  <td>'.$value["nombre"].'</td>';

                              

                  echo ' 
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-primary btnEditarRol" data-toggle="modal" data-target="#modalEditarRol" idRol="'.$value["id"].'" ><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarRol" idRol="'.$value["id"].'"  ><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
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

<div id="modalEditarRol" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar rol</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
                <div class="form-group">
                  <label>Nombre:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span> 

                    <input type="text" class="form-control " id="editarRol" name="editarRol" required>

                     <input type="hidden"  name="idRol" id="idRol">

                  </div>

                </div>


          </div>
 
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar rol</button>

        </div>

        <?php

         $editarRol = new ControladorRoles();
         $editarRol -> ctrEditarRol();

?> 


      </form>

    </div>

  </div>

</div>

<?php

  $borrarRol = new ControladorRoles();
  $borrarRol -> ctrBorrarRol();

?> 
