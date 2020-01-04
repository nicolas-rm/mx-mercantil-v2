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

       <div class="col-md-12">
         <!-- xs (phones), sm (tablets), md (desktops), and lg (larger desktops).-->

         <div class="box box-primary">

           <form role="form" method="post" enctype="multipart/form-data">

             <div class="box-header">
               <h3 class="box-title">Insertar datos</h3>
             </div>

             <div class="box-body">

               <div class="row">

                            <div class="col-md-4">
           


               <div class="form-group">

                 <label>Nombre del camion:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                   <select class="form-control text-uppercase" id="nuevoCamion" name="nuevoCamion" required>

                     <option value="">Seleccionar camion</option>

                     <?php

                         $respuesta = ModeloCalendario::mdlMostrarCalendario();

                      foreach ($respuesta as $key => $value) {
                        // if ($value["ID_CAMIONES"] != "1") {

                        echo '<option value="' . $value["ID_CAMIONES"] . '">' . $value["NOMBRE_CAMION"] . '</option>';
                        // }
                      }

                      ?>

                   </select>

                 </div>

               </div>





               <div class="form-group">

                 <label>Nombre del conductor:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                   <select class="form-control text-uppercase" id="nuevoConductor" name="nuevoConductor" required>

                     <option value="">Seleccionar conductor</option>

                     <?php
                      // $readStatus = new EstatusControlador();
                      $respuesta = ModeloConductores::mostrarConductorModelo("CONDUCTORES");

                      $value = null;
                      $item = null;

                      $sucursales = ControladorSucursales::ctrMostrarSucursales($value, $item);
                      $status = EstatusModelo::MostrarEstatus("ESTATUS_CONDUCTORES");

                      // $status = $readStatus->mostrarEstatus("ESTATUS_CAMIONES");
                      foreach ($respuesta as $key => $value) {
                        // if ($value["ID_CONDUCTORES"] != "1") {
                        # code...
                        $descripcion = null;
                        foreach ($status as $key => $valor) {
                          if ($value["ID_ESTATUS_CONDUCTORES"] == $valor["ID_ESTATUS_CONDUCTORES"]) {
                            $descripcion = $valor["DESCRIPCION"];
                          }
                        }

                        if ($descripcion == "ACTIVO") {
                          foreach ($sucursales as $key => $vale) {
                            if ($value["ID_SUCURSALES"] == $vale["id"]) {
                              echo '<option value="' . $value["ID_CONDUCTORES"] . '">' . $value["NOMBRE"], " ", $value["APELLIDOS"], " - ", $vale["nombre"] . '</option>';
                            }
                          }
                        }
                        // }
                      }
                      ?>

                   </select>

                 </div>

               </div>
           
              <!-- /.form-group -->
            </div>
               <div class="col-md-4">
 
                                   <div class="form-group">

                 <label>Procedencia:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

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
              <!-- /.form-group -->
            </div>

            <div class="col-md-4">

  
               <div class="form-group">
                 <label>kilometraje:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                   <input type="number" class="form-control " id="nuevokilometraje" step="0.01" name="nuevoKilometraje" placeholder="requerido" required>

                 </div>

               </div>


               <div class="form-group">
                 <label>nombre de mecanico:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                   <input type="text" class="form-control " id="nuevoNombreMecanico" name="nuevoNombreMecanico" placeholder="requerido" required>

                 </div>

               </div>

              <!-- /.form-group -->
            </div>

             <div class="col-md-4">

               <div class="form-group">
                 <label>costo:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                   <input type="number" class="form-control " id="nuevoCosto" name="nuevoCosto" step="0.01" placeholder="requerido" required>

                 </div>

               </div>

    
 

              <!-- /.form-group -->
            </div>

 
             <div class="col-md-8">

      

               <div class="form-group">
                 <label>Descripcion:</label>

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

                   <input class="form-control" id="nuevoDescripcion" step="0.01" name="nuevoDescripcion" placeholder="requerido" required>  

                 </div>

               </div>
 

              <!-- /.form-group -->
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
             <h3 class="box-title">Mantemientos agregados</h3>

                <button id="todospdf" class="btn btn-primary todoPDF pull-right">TODOS LOS PDF</button>
           </div>

           <!-- /.box-header -->
           <div class="box-body"> 
             <table class="table table-bordered dt-responsive example">



               <thead>


                 <tr>

                   <!-- <th>FECHA SERVICIO</th> -->
                   <th>PROCEDENCIA</th>
                   <th>CHOFER</th>
                   <th>CAMION</th>
                   <th>TALLER</th>
                   <th>KILOMETRAJE</th>
                   <th>SERVICIO</th>
                   <th>MECANICO</th>
                   <th>COSTO</th>
                   <!-- <th>PROXIMO SERVICIO</th> -->


                   <th style="width:50px">Acciones</th>

                 </tr>

               </thead>

               <tbody>

                 <?php

                  $item = null;
                  $valor = null;

                  $mantenimiento = ControladorMantenimientos::ctrMostrarMantenimientos($item, $valor);

                  foreach ($mantenimiento as $key => $value) {


                    echo ' <tr>';
                    $item = "id";


                    $valor = $value["id_sucursal"];
                    $sucur_nombre = ControladorSucursales::ctrMostrarSucursales($item, $valor);
                    echo '<td>' . $sucur_nombre["nombre"] . '</td>';


                    $respuesta = ModeloConductores::mostrarConductorModelo("CONDUCTORES");
                    $chofe = null;
                    foreach ($respuesta as $key => $val) {

                      if ($value["ID_CONDUCTORES"] == $val["ID_CONDUCTORES"]) {
                        $chofe = $val["NOMBRE"];
                      }
                    }

                    $respuesta = ModeloCamiones::mostrarCamionesModelo("CAMIONES");
                    $camionzila = null;
                    foreach ($respuesta as $key => $vale) {

                      if ($value["ID_CAMIONES"] == $vale["ID_CAMIONES"]) {
                        $camionzila = $vale["NOMBRE_CAMION"];
                      }
                    }
                    echo '<td>' . $chofe . '</td>';
                    echo '<td>' . $camionzila . '</td>';
                    echo '<td>' . $value["nombre_taller"] . '</td>';
                    echo '<td>' . $value["kilometraje"] . '</td>';
                    echo '<td>' . $value["descripcion"] . '</td>';
                    echo '<td>' . $value["nombre_mecanico"] . '</td>';
                    echo '<td>' . $value["precio"] . '</td>';


                    echo ' 

                  <td>

                    <div class="btn-group">
              
               <button id="btnEditarMantenimiento" type="button" class="btn btn-primary btnEditarMantenimiento" data-toggle="modal" data-target="#modalEditarMantenimiento" value="' . $value["id"] . '" idMantenimiento="' . $value["id"] . '" ><i class="fa fa-pencil"></i></button>

                <button id="unpdf" class="btn btn-danger" value="' . $value["id"] . '"><i class="fa fa-file-pdf-o"></i></button>


                <button id="total" class="btn btn-warning" value="' . $value["id"] . '"><i class="fa fa-bar-chart-o"></i></button>

                    


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



           <div class="form-group">

             <label>Procedencia:</label>

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

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

             <label>Nombre del conductor:</label>

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

               <select class="form-control text-uppercase" id="editarConductor" name="editarConductor" required>

                 <option value="">Seleccionar conductor</option>

                 <?php


                  $respuesta = ModeloConductores::mostrarConductorModelo("CONDUCTORES");

                  foreach ($respuesta as $key => $value) {

                    if ($value["ID_CONDUCTORES"] != "1") {
                      echo '<option value="' . $value["ID_CONDUCTORES"] . '">' . $value["NOMBRE"] . '</option>';
                    }
                  }

                  ?>

               </select>

             </div>

           </div>


           <div class="form-group">

             <label>Nombre del camion:</label>

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

               <select class="form-control text-uppercase" id="editarCamion" name="editarCamion" required>

                 <option value="">Seleccionar camion</option>

                 <?php

                  $respuesta = ModeloCamiones::mostrarCamionesModelo("CAMIONES");

                  foreach ($respuesta as $key => $value) {
                    if ($value["ID_CAMIONES"] != "1") {

                      echo '<option value="' . $value["ID_CAMIONES"] . '">' . $value["NOMBRE_CAMION"] . '</option>';
                    }
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

               <input type="number" class="form-control " id="editarkilometraje" step="0.01" name="editarKilometraje" required>

             </div>

           </div>



           <div class="form-group">
             <label>Descripcion:</label>

             <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-podcast"></i></span>

               <textarea class="form-control " id="editarDescripcion" step="0.01" name="editarDescripcion" required> </textarea>

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

               <input type="number" class="form-control " id="editarCosto" step="0.01" name="editarCosto" required>

             </div>

           </div>


         </div>

         <div class="modal-footer">

           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

           <button type="submit" class="btn btn-primary">Modificar mantenimiento</button>

         </div>

         <?php

          $editarMantenimiento = new ControladorMantenimientos();
          $editarMantenimiento->ctrEditarMantenimiento();


          ?>
     </div>

     <!--=====================================
        PIE DEL MODAL
        ======================================-->

     </form>

   </div>

 </div>