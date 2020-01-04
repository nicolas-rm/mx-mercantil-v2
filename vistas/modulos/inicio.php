 
<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "mx_mercantil");
$query = "SELECT SUM(MONTO_TOTAL) as tPrecio, YEAR(fecha_registro) as fechaT FROM viaje GROUP BY YEAR(fecha_registro)";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ year:'".$row["fechaT"]."', profit:".$row["tPrecio"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);


?>

<?php 


$connect2 = mysqli_connect("localhost", "root", "", "mx_mercantil");
$query2 = "SELECT SUM(precio) as tPrecio, YEAR(fecha) as fechaT FROM mantenimiento GROUP BY YEAR(fecha)";
$result2 = mysqli_query($connect2, $query2);
$chart_data2 = '';
while($row = mysqli_fetch_array($result2))
{
 $chart_data2 .= "{ year2:'".$row["fechaT"]."', profit2:".$row["tPrecio"]."}, ";
}
$chart_data2 = substr($chart_data2, 0, -2);


 ?>

<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">

         <div class="row">
 
        <div class="col-md-8">
           <div class="box box-primary">

            <div class="box-header with-border">
              <center> <h3 class="box-title"><strong>Mercantil del Constructor S.A. de C.V.</strong> </h3> </center>
            </div>
 
            <!-- /.box-header -->
           <center> <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">


                    <center> <img src="vistas/img/plantilla/cendi.jpg" style="width: 100%"  alt="First slide"></center> 

                    <div class="carousel-caption">
                      Cendi
                    </div>
                  </div>
                  <div class="item">
                    <center> <img src="vistas/img/plantilla/fondox.jpg" style="width: 100%"  alt="First slide"></center>

                    <div class="carousel-caption">
                      Casa Matriz
                    </div>
                  </div>
                  <div class="item">
                   <center> <img src="vistas/img/plantilla/casaHerrero2.jpg" style="width: 100%" alt="Third slide"></center>

                    <div class="carousel-caption">
                      Casa del Herrero
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div></center>
            <!-- /.box-body -->
          </div> 
          <!-- /.box -->
        </div> 

          <div class="col-md-4">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Mision</a></li>
              <li><a href="#timeline" data-toggle="tab">Vision</a></li>
              <li><a href="#settings" data-toggle="tab">Valores</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="vistas/img/plantilla/MC.png" alt="user image">
                        <span class="username">
                          <a href="#">Mercantil del Contructor S.A. de C.V.</a>
                          
                        </span>
                     
                  </div>
                  <!-- /.user-block -->
                  <CENTER> 
                  <p>
                    Ser el líder en la comercialización de materiales y productos para la construcción.
                  </p>
                  </CENTER>
                   
                </div>
                <br><br><br><br><br><br><br>
                <!-- /.post -->
 
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                   <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="vistas/img/plantilla/MC.png" alt="user image">
                        <span class="username">
                          <a href="#">Mercantil del Contructor S.A. de C.V.</a>
                          
                        </span>
                     
                  </div>
                  <!-- /.user-block -->
                  <CENTER> 
                  <p>
                    Nuestra visión es el continuo crecimiento utilizando todas las herramientas disponibles, para continuar siendo una empresa líder  en  la  comercialización de productos para la industria de la construcción
                  </p>
                  </CENTER>
                   
                </div>
                <br><br><br><br><br>
     
                 
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="vistas/img/plantilla/MC.png" alt="user image">
                        <span class="username">
                          <a href="#">Mercantil del Contructor S.A. de C.V.</a>
                          
                        </span>
                     
                  </div>
                  <!-- /.user-block -->
                  
                  <p>  
                  <strong>* Ética.</strong> <br> Nuestra ética laboral, comercial y social es lo que nos distingue. <br>
                  <strong>* Trabajo.</strong> <br> Estamos conscientes de que el trabajo duro e inteligente es la mejor forma de lograr nuestros objetivos de mejora continua. <br>
                  <strong>* Responsabilidad.</strong> <br> Hacia nuestros clientes, colaboradores y la sociedad.
                  </p>
                  
                   
                </div>
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      
    </div> 

   

 <div class="row">
          <div class="col-md-12">
        
        <div class="box box-danger">

          <div class="card-body bg-danger text-white text-center">
                          
               <center><h3>MENU PRINCIPAL</h3></center> 
          </div>

 
              <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-4 text-center">
                                        <p>
                                            <a  target="_blank"><img src="vistas/img/plantilla/menuPrincipal/sucursales.png" width="80px" alt="Comunidad"></a>
                                        </p>
                                        <p><p><label>SUCURSALES</label></p></p>


                                        
                                    </div> 

                                    <div class="col-12 col-sm-4 text-center">
                                        <p>
                                            <a  target="_blank"><img src="vistas/img/plantilla/menuPrincipal/conductores.png" width="80px" alt="Comunidad"></a>
                                        </p>
                                        <p><label>CONDUCTORES</label></p>


                                         
                                    </div>

                                    <div class="col-12 col-sm-4 text-center">
                                        <p>
                                            <a  target="_blank"><img src="vistas/img/plantilla/menuPrincipal/camiones.png" width="80px" alt="Comunidad"></a>
                                        </p>
                                        <p><p><label>CAMIONES</label></p></p>
                                        
                                    </div>

                                    <div class="col-12 col-sm-4 text-center">
                                        <p>
                                            <a  target="_blank"><img src="vistas/img/plantilla/menuPrincipal/pedidos.png" width="80px" alt="Comunidad"></a>
                                        </p>
                                        <p><p><label>PEDIDOS</label></p></p>
                                        
                                    </div>


                                    <div class="col-12 col-sm-4 text-center">
                                        <p>
                                            <a target="_blank"><img src="vistas/img/plantilla/menuPrincipal/mantenimiento.png" width="80px" alt="Guía de Uso"></a>
                                        </p>
                                        <p><p><label>MANTENIMIENTO</label></p></p>
                                         
                                        
                                    </div>                                        
                                    <div class="col-12 col-sm-4 text-center">
                                        <p>
                                            <a target="_blank"><img src="vistas/img/plantilla/menuPrincipal/reportes.png" width="80px" alt="Ticket"></a>
                                        </p>
                                        <p><p><label>CALENDARIO</label></p></p>
                                        
                                    </div>
                                </div>
                            </div>
                 
        </div>

        </div>
         
      </div>

      <div class="row">

       <div class="col-md-12">
                <div class="box box-success">

          <div class="card-body bg-success text-white text-center">
                          
               <center><h3>Viajes por años</h3></center> 
          </div>

             <div class="nav-tabs-custom">
 
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div id="chart1" style="position: relative; height: 300px;"></div> 
            </div>
          </div>
        </div>
      </div>

           <div class="col-md-12">
                <div class="box box-warning">

          <div class="card-body bg-warning text-white text-center">
                          
               <center><h3>Mantenimientos por años</h3></center> 
          </div>

             <div class="nav-tabs-custom">
 
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div id="chart2" style="position: relative; height: 300px;"></div> 
            </div>
          </div>
        </div>
      </div>
 
</div>

        
     
  </section>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

 <script>
 
 Morris.Bar({
 element : 'chart1',
 data:[<?php echo $chart_data; ?>],
 xkey:'year',
 ykeys:['profit'], //precio
 labels:['precio'],
 hideHover:'auto',
 stacked:true,
 barColors: ['#57CA65'],
 barWidth: 1,
 resize: true
});

Morris.Bar({
 element : 'chart2',
 data:[<?php echo $chart_data2; ?>],
 xkey:'year2',
 ykeys:['profit2'], //precio
 labels:['precio'],
 hideHover:'auto',
 stacked:true,
 barColors: ['#BF39F5'],
 barWidth: 1,
 resize: true
});
 
 
</script>
 