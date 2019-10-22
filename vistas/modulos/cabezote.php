<?php

  $item = null;
 $valor = null;
               
 $sucursales = ControladorSucursales::ctrMostrarSucursales($item, $valor);
 $totalSucursales = count($sucursales);

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
			
			Sistema :v

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

            <li class="dropdown notifications-menu"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-building"></i>
              <span class="label label-warning"><?php echo number_format($totalSucursales); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Sucursales Agregadas: <?php echo number_format($totalSucursales); ?></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  

                  <li>
                    <a >
                      <i class="fa fa-building text-aqua"></i> <?php echo number_format($totalSucursales); ?> Agregados
                    </a>
                  </li>

                </ul>
              </li>
              <li class="footer"><a href="sucursales">Ver todas</a></li>
            </ul>
          </li>


            <li class="dropdown notifications-menu"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-address-card-o"></i>
              <span class="label label-warning"><?php echo number_format($totalSucursales); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Conductores Agregadas: <!-- <?php echo number_format($totalSucursales); ?> --></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  

                  <li>
                    <a >
                      <i class="fa fa-address-card-o text-aqua"></i><!--  <?php echo number_format($totalSucursales); ?> --> Agregados
                    </a>
                  </li>

                </ul>
              </li>
              <li class="footer"><a href="conductores">Ver todos</a></li>
            </ul>
          </li>

            <li class="dropdown notifications-menu"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-car"></i>
              <span class="label label-warning"><?php echo number_format($totalSucursales); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Camiones Agregadas: <!-- <?php echo number_format($totalSucursales); ?> --></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  

                  <li>
                    <a >
                      <i class="fa fa-car text-aqua"></i><!--  <?php echo number_format($totalSucursales); ?> --> Agregados
                    </a>
                  </li>

                </ul>
              </li>
              <li class="footer"><a href="camiones">Ver todos</a></li>
            </ul>
          </li>



        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">

            <?php

            if($_SESSION["foto"] != ""){

              echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

            }else{


              // echo '<img src="vistas/img/usuarios/default/usuario1.png" class="user-image">';
              echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

            }


            ?>
            
            <span class="hidden-xs">
              <?php  echo $_SESSION["usuario"]; ?></span>

          </a>


          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">



              <?php

              if($_SESSION["foto"] != ""){

                echo '<img src="'.$_SESSION["foto"].'" class="img-circle" alt="User Image">';

              }else{


                // echo '<img src="vistas/img/usuarios/default/usuario1.png" class="img-circle" alt="User Image">';
                echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle" alt="User Image">';

              }


              ?>

              <p>


                <small> <?php echo $_SESSION["usuario"]; ?> </small>
               
               <?php
                
                if($_SESSION["id_rol"] == 1){ 

                echo "Administrador";

                 }   
                               

                ?>  

             </p>

           </li>



           <!-- Menu Footer-->
           <li class="user-footer">

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
 


 <!-- checar bien los modulos y estatus -->