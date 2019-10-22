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

                    <span class="input-group-addon"><i class="fa fa-building"></i></span> 

                    <input type="text" class="form-control text-uppercase"   name="nuevoNombreS" placeholder="requerido" required="">

                  </div>

                </div>

                 

                <div class="form-group">
                  <label>Telefono:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                    <input type="number" class="form-control" name="nuevoTelefonoS" placeholder="requerido" required="">

                  </div>

                </div>

                 

                <div class="form-group">
                  <label>Ciudad / Municipio:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                    <input type="text" class="form-control text-uppercase" name="nuevoCiudadS" placeholder="requerido" required="">

                  </div>

                </div>

                 

                <div class="form-group">
                  <label>Direccion:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span> 

                    <input type="text" class="form-control text-uppercase" name="nuevoDireccionS" placeholder="requerido" required="">

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

                  <?php 
                  if($_SESSION["id_rol"] == 1){

                  echo ' <tr>
                  <th style="width:150px">Nombre</th>

                  <th style="width:50px" >Telefono</th>';

                  echo '<th style="width:80px">Ubicacion</th>';

                  echo '<th style="width:170px">Direccion</th>';

                  echo '<th style="width:20px" ></th>';

  
                  
 
                  echo '<th style="width:20px" ></th>

                </tr>';



                  }else{


                                      echo ' <tr>
                  <th style="width:150px">Nombre</th>

                  <th style="width:50px" >Telefono</th>';

                  echo '<th style="width:80px">Ubicacion</th>';

                  echo '<th style="width:170px">Direccion</th>';

 
                  echo '<th style="width:20px" ></th>

                </tr>';



                  }

                   ?>




<!--                  <tr>

                   <th style="width:150px">Nombre</th>
                   <th style="width:50px" >Telefono</th>                     MODIFICAR DISEÑO DE TABLAS Y PERFILES EN BASE A MODULO SUCURSAL Y JAVA SCRIPT DE TABLAS
                   <th style="width:80px">Ubicacion</th>
                   <th style="width:170px">Direccion</th>
                   
                    
                   <th style="width:20px" ></th>

                 </tr>  -->

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


                  if($_SESSION["id_rol"] == 1){
                  echo '<td>

                    <button class="btn btn-warning  "  ><i class="fa fa-pencil"></i></button>

                  </td>';
                          }
                  
 
                  echo '<td>

                      <button class="btn btn-danger btnEliminarRol" idRol="'.$value["id"].'"  ><i class="fa fa-times"></i></button>
                   
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


