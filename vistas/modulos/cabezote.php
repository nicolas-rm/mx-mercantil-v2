<?php

  $item = null;
 $valor = null;
               
 $Usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
 $totalUsuarios = count($Usuarios);

// $conductores = ControladorConductores::ctrMostrarConductores($item, $valor);
//  $totalConductores = count($conductores);
             
 ?>

<header class="main-header">




	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="inicio" class="logo">
		
		<!-- logo mini -->
		<span class="logo-mini">
			
			<img src="vistas/img/plantilla/MC.png" class="img-responsive" style="padding:10px">

		</span>

		<!-- logo normal -->

		<span class="logo-lg">
			
			Sistema SAUR

		</span>

	</a>


  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
 

            <!-- <li class="dropdown notifications-menu"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-car"></i>
              <span class="label label-warning"><?php echo number_format($totalUsuarios); ?></span>
            </a>
            <ul class="dropdown-menu"> -->
              <!-- <li class="header">Camiones en mantenimiento: --> <!-- <?php echo number_format($totalSucursales); ?>  </li>-->
              <!-- <li> -->
                <!-- inner menu: contains the actual data -->
                <!-- <ul class="menu">
                  

                  <li>
                    <a > -->
                      <!-- <i class="fa fa-car text-aqua"></i> --><!--  <?php echo number_format($totalSucursales); ?> -  Agregados-->
                   <!--  </a>
                  </li>

                </ul>
              </li>
              <li class="footer"><a href="camiones">Ver todos</a></li>
            </ul>
          </li>
 -->


        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">

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

                    echo '<td><img src="'.$value["foto"].'" class="user-image"  ></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/default/anonymous2.png" class="user-image"  ></td>';

                  }
 
              

                       
                    }
                 
                  }

                  

                ?>  
            
            <span class="hidden-xs">
              <?php  echo $_SESSION["usuario"]; ?>
                
              </span>

          </a>


          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">



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

               

              <p>
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
                  <br>

                               <?php

                $actual = $_SESSION["id"];

                $item = null;
                $valor = null;

                $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

 
                foreach ($usuario as $key => $value){
 
                    if($actual == $value["id"] ){ 


                      $item = "id";
                   $valor = $value["id_rol"];
                   $rol_nombre = ControladorRoles::ctrMostrarRoles($item, $valor);

                   

                  echo ' <tr>
                  <td>'.$rol_nombre["nombre"].'</td>';
 
                

                       
                    }
                 
                  }

                  

                ?>
               


                

             </p>

           </li>

           <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center btn btn-info btn-flat">
                    <a href="bienvenida">Bienvenida</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>



           <!-- Menu Footer-->
           <li class="user-footer">

            <div class="pull-left">
            <a href="perfil" class="btn btn-warning btn-flat">Perfil</a>
            </div>

             
                   

            <div class="pull-right">
              <a href="salir" class="btn btn-danger btn-flat">Salir</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
</header>

 
 

 