  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Sucursales
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Sucursales</li>
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

                    <input type="text" class="form-control "   name="nuevoNombreS" placeholder="requerido" required="">

                  </div>

                </div>

                 

                <div class="form-group">
                  <label>Telefono:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span> 

                    <input type="number" class="form-control" name="nuevoTelefonoS" placeholder="requerido" required="">

                  </div>

                </div>

                 

                <div class="form-group">
                  <label>Ubicacion:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span> 

                    <input type="text" class="form-control " name="nuevoCiudadS" placeholder="requerido" required="">

                  </div>

                </div>

                 

                <div class="form-group">
                  <label>Direccion:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span> 

                    <input type="text" class="form-control " name="nuevoDireccionS" placeholder="requerido" required="">

                  </div>

                </div>

                
                <br>
                <div class="modal-footer">

                  <!-- <button type="reset" class="btn btn-danger pull-left" value="Borrar">Cancelar</button> -->

                  <button type="submit" class="btn btn-primary">Guardar Sucursal</button>

                </div>

                 <?php

                $crearSucursal = new ControladorSucursales();
                $crearSucursal -> ctrCrearSucursal();

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
              <h3 class="box-title">Sucursales agregadas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
              <table class="table table-bordered dt-responsive example"> 


                <thead>
 
                   <tr>

                   <th style="width:150px">Nombre</th>
                   <th style="width:50px" >Telefono</th>
                   <th style="width:80px">Ubicacion</th>
                   <th style="width:170px">Direccion</th>
                    
                   <th>Acciones</th>

                 </tr> 
 

               </thead>

               <tbody>

                <?php

                $item = null;
                $valor = null;

                $sucursales = ControladorSucursales::ctrMostrarSucursales($item, $valor);

                foreach ($sucursales as $key => $value){

                  echo ' <tr>
                  <td>'.$value["nombre"].'</td>

                  <td>'.$value["telefono"].'</td>';

                  echo '<td>'.$value["ciudad"].'</td>';

                  echo '<td>'.$value["direccion"].'</td>';
                  
 
                  echo '<td>

                  <div class="btn-group">

                  <button class="btn btn-primary btnEditarSucursal " idSucursal="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarSucursal"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger btnEliminarSucursal" idSucursal="'.$value["id"].'" ><i class="fa fa-times"></i></button>

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

<div id="modalEditarSucursal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar sucursal</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

                  <div class="form-group">
                  <label>Nombre:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span> 

                    <input type="text" class="form-control "   name="editarNombreS" id="editarNombreS" >

                      <input type="hidden"  name="idSucursal" id="idSucursal">

                  </div>

                </div>

                 

                <div class="form-group">
                  <label>Telefono:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span> 

                    <input type="number" class="form-control" name="editarTelefonoS" id="editarTelefonoS">

                  </div>

                </div>

                 

                <div class="form-group">
                  <label>Ubicacion:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span> 

                    <input type="text" class="form-control " name="editarCiudadS" id="editarCiudadS">

                  </div>

                </div>

                 

                <div class="form-group">
                  <label>Direccion:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-podcast"></i></span> 

                    <input type="text" class="form-control " name="editarDireccionS" id="editarDireccionS" >

                  </div>

                </div>


          </div>
 
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar sucursal</button>

        </div>

        <?php

         $editarSucursal = new ControladorSucursales();
         $editarSucursal -> ctrEditarSucursal();

        ?> 


      </form>

    </div>

  </div>

</div>

 <?php

 $borrarSucursal = new ControladorSucursales();
 $borrarSucursal -> ctrBorrarSucursal();

 ?> 