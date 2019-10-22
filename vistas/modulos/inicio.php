<?php

$item = null;
$valor = null;
$orden = "id";


$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
$totalUsuarios = count($usuarios);

$sucursales = ControladorSucursales::ctrMostrarSucursales($item, $valor);
$totalSucursales = count($sucursales);


?>

<div class="content-wrapper">


     
<!--     <div class="row">
       

      <div class="col-md-12">
        
        <div class="box box-danger">

           
          <section class="content">
            
              <center>
              <img class="img-responsive" src="vistas/img/plantilla/inicio.jpg" width="1000" height="100">
              </center>
            
          </section>


          
        </div>
         
      </div>
      
    </div> -->

  <!-- Main content -->
  <section class="content">
     

    <!-- Info boxes -->
    <div class="row">

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">

          

                <span class="info-box-icon bg-yellow"><a href="usuarios"><i class="fa fa-users"></i></a></span> 
 

             <div class="info-box-content"> 
                  
              <span class="info-box-text">Usuarios</span> 
 
            <span class="info-box-number"><h3><?php echo number_format($totalUsuarios); ?></h3></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div> 

      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><a href="sucursales"><i class="fa fa-hospital-o"></i></a></span>

          <div class="info-box-content">
            <span class="info-box-text">Sucursales</span>
            <span class="info-box-number"><h3><?php echo number_format($totalSucursales); ?></h3></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-purple"><i class="fa fa-times"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">x</span>
            <span class="info-box-number">x</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-purple"><i class="fa fa-times"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">x</span>
            <span class="info-box-number">x</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>


    <!-- Info boxes -->
    <div class="row">

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-purple"><i class="fa fa-times"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">x</span>
            <span class="info-box-number">x</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-purple"><i class="fa fa-times"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">x</span>
            <span class="info-box-number">x</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>


    </div>

    <!-- /.row -->


  </section>


  <!-- /.content -->
</div>
<!-- /.content-wrapper -->