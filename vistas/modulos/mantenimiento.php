 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Administrar Mantenimiento

     </h1>
     <ol class="breadcrumb">
       <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

       <li class="active">Mantenimiento</li>
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
                 <label>fecha de servicio:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                   <input type="date" class="form-control " id="nuevoFechaServicio" name="nuevoFechaServicio" placeholder="requerido" required>

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

                        echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                      }

                      ?>

                   </select>

                 </div>

               </div>





               <div class="form-group">
                 <label>nombre de taller:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                   <input type="text" class="form-control " id="nuevoNombreTaller" name="nuevoNombreTaller" placeholder="requerido" required>

                 </div>

               </div>

               <div class="form-group">
                 <label>kilometraje:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                   <input type="number" class="form-control " id="nuevokilometraje" name="nuevoKilometraje" placeholder="requerido" required>

                 </div>

               </div>



               <div class="form-group">
                 <label>Descripcion:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                   <textarea class="form-control" id="nuevoDescripcion" name="nuevoDescripcion" placeholder="requerido" required> </textarea>

                 </div>

               </div>

               <div class="form-group">
                 <label>nombre de mecanico:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                   <input type="text" class="form-control " id="nuevoNombreMecanico" name="nuevoNombreMecanico" placeholder="requerido" required>

                 </div>

               </div>


               <div class="form-group">
                 <label>costo:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                   <input type="number" class="form-control " id="nuevoCosto" name="nuevoCosto" placeholder="requerido" required>

                 </div>

               </div>

               <div class="form-group">
                 <label>proximo servicio:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                   <input type="date" class="form-control " id="nuevoProximoServicio" name="nuevoProximoServicio" placeholder="requerido" required>

                 </div>

               </div>




               <br>
               <div class="modal-footer">

                 <!-- <button type="reset" class="btn btn-danger pull-left" value="Borrar">Cancelar</button> -->

                 <button type="submit" class="btn btn-primary">Guardar Mantenimientos</button>

               </div>

               <?php

                $crearMantenimiento = new ControladorMantenimientos();
                $crearMantenimiento->ctrCrearMantenimiento();

                ?>



             </div>
           </form>

         </div>


       </div>


       <div class="col-md-12">
         <div class="box box-primary">
           <div class="box-header">
             <h3 class="box-title">Roles agregadas</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table class="table table-bordered dt-responsive example">


               <thead>

                 <tr>

                   <th>FECHA SERVICIO</th>
                   <th>PROCEDENCIA</th>
                   <th>TALLER</th>
                   <th>KILOMETRAJE</th>
                   <th>SERVICIO</th>
                   <th>MECANICO</th>
                   <th>COSTO</th>
                   <th>PROXIMO SERVICIO</th>


                   <th style="width:50px">Acciones</th>

                 </tr>

               </thead>

               <tbody>

                 <?php

                  $item = null;
                  $valor = null;

                  $mantenimiento = ControladorMantenimientos::ctrMostrarMantenimientos($item, $valor);

                  foreach ($mantenimiento as $key => $value) {


                    echo ' <tr>
                  <td>' . $value["fecha_servicio"] . '</td>';
                    $item = "id";


                    $valor = $value["id_sucursal"];
                    $sucur_nombre = ControladorSucursales::ctrMostrarSucursales($item, $valor);

                    echo '<td>' . $sucur_nombre["nombre"] . '</td>';
                    echo '<td>' . $value["nombre_taller"] . '</td>';
                    echo '<td>' . $value["kilometraje"] . '</td>';
                    echo '<td>' . $value["descripcion"] . '</td>';
                    echo '<td>' . $value["nombre_mecanico"] . '</td>';
                    echo '<td>' . $value["precio"] . '</td>';
                    echo '<td>' . $value["proximo_servicio"] . '</td>';

                    echo ' 

                  <td>

                    <div class="btn-group">
              
               <button id="btnEditarMantenimiento" type="button" class="btn btn-primary btnEditarMantenimiento" data-toggle="modal" data-target="#modalEditarMantenimiento" value="' . $value["id"] . '" idMantenimiento="' . $value["id"] . '" ><i class="fa fa-pencil"></i></button>
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

 <div id="modalEditarMantenimiento" class="modal fade" role="dialog">

   <div class="modal-dialog">

     <div class="modal-content">

       <form role="form" method="post" enctype="multipart/form-data">

         <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

         <div class="modal-header" style="background:#3c8dbc; color:white">

           <button type="button" class="close" data-dismiss="modal">&times;</button>

           <h4 class="modal-title">Editar mantenimiento</h4>

         </div>

         <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

         <div class="modal-body">

           <div class="box-body">

             <!-- ENTRADA PARA EL NOMBRE -->

             <div class="form-group">
               <label>fecha de servicio:</label>

               <div class="input-group">

                 <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                 <input type="date" class="form-control " id="editarFechaServicio" name="editarFechaServicio" required>

               </div>

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

                    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                  }

                  ?>

               </select>

             </div>

           </div>



           <div class="form-group">
             <label>nombre de taller:</label>

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

               <input type="text" class="form-control " id="editarNombreTaller" name="editarNombreTaller" required>

               <input type="hidden" name="idMantenimiento" id="idMantenimiento">

             </div>

           </div>

           <div class="form-group">
             <label>kilometraje:</label>

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

               <input type="number" class="form-control " id="editarkilometraje" name="editarKilometraje" required>

             </div>

           </div>



           <div class="form-group">
             <label>Descripcion:</label>

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

               <textarea class="form-control " id="editarDescripcion" name="editarDescripcion" required> </textarea>

             </div>

           </div>

           <div class="form-group">
             <label>nombre de mecanico:</label>

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

               <input type="text" class="form-control " id="editarNombreMecanico" name="editarNombreMecanico" required>

             </div>

           </div>





           <div class="form-group">
             <label>costo:</label>

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

               <input type="number" class="form-control " id="editarCosto" name="editarCosto" required>

             </div>

           </div>

           <div class="form-group">
             <label>proximo servicio:</label>

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

               <input type="date" class="form-control " id="editarProximoServicio" name="editarProximoServicio" required>

             </div>

           </div>


         </div>

     </div>

     <!--=====================================
        PIE DEL MODAL
        ======================================-->

     <div class="modal-footer">

       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       <button type="submit" class="btn btn-primary">Modificar mantenimiento</button>

     </div>

     <?php

      $editarMantenimiento = new ControladorMantenimientos();
      $editarMantenimiento->ctrEditarMantenimiento();


      ?>
     </form>

   </div>

 </div>

 </div>