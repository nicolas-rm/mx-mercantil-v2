  <!-- Content Wrapper. Contains page content -->

  <?php
    require_once('modelos/bdd.php');


    $sql = "SELECT id, title, start, end, color FROM events where estatus = 1 ";

    $req = $bdd->prepare($sql);
    $req->execute();

    $events = $req->fetchAll();

    ?>


  <div class="content-wrapper">


    <style>
          body {
            padding-top: 20px;
            
          }
          #calendar {
            max-width: 800px;
          }
          .col-centered{
            float: none;
            margin: 0 auto;
          }
          .fc-future{
            background-color:  #fff ;
          }
          .fc-past {
            background-color:  #e1d8d9 ;
          }
          #ModalAdd {
          }
          .modal-header{
            background-color: #4ea5df;
            background-image: url("vistas/img/plantilla/SAMA.png")


          }
          .modal-title{
            text-color: #ffff;
          }
          </style>
 
                   <!-- /.clock -->
          <script src="vistas/js/FullCalendar/js/bootstrap-clockpicker.js"></script>
          <script src="vistas/js/FullCalendar/js/clockpicker.js"></script>
          <link rel="stylesheet" href="vistas/dist/FullCalendar/css/bootstrap-clockpicker.css">
          <link rel="stylesheet" href="vistas/dist/FullCalendar/css/clockpicker.css">

          <!-- jQuery Version 1.11.1 -->
          
          <script src="vistas/js/FullCalendar/js/jquery.js"></script>

          <!-- Bootstrap Core JavaScript -->
          <script src="vistas/js/FullCalendar/js/bootstrap.min.js"></script>
          
          <!-- FullCalendar -->
          <script src='vistas/js/FullCalendar/js/moment.min.js'></script>
          <script src='vistas/js/FullCalendar/js/fullcalendar/fullcalendar.min.js'></script>
          <script src='vistas/js/FullCalendar/js/fullcalendar/fullcalendar.js'></script>
          <script src='vistas/js/FullCalendar/js/fullcalendar/locale/es.js'></script>
          <!-- /.clock -->
          <script src="vistas/js/FullCalendar/js/bootstrap-clockpicker.js"></script>
          <link rel="stylesheet" href="vistas/dist/FullCalendar/css/bootstrap-clockpicker.css">
           <link href='vistas/dist/FullCalendar/css/fullcalendar.css' rel='stylesheet'>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selecciona una fecha para agendar mantenimiento
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Roles</li>
      </ol>
    </section>
    


    <!-- Main content -->
    <section class="content">

       <div class="row">

        <div class="col-md-12">
          

          <div class="alert alert-warning alert-dismissible">
                <h4><i class="icon fa fa-warning"></i> Atencion! .. Instrucciones</h4>
                1. Realizar el registro del mantenimiento del camion en el Calendario. <br>
                2. Dar click en la Notificacion para registrar los detalles del mantenimiento. <br>
                3. Cuando se finalice un mantenimiento dar click en el boton Finalizar.
              </div>

        </div>

         <div class="col-md-3">
        <div class="box box-success">

             <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Tipos de mantenimientos</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-green">Preventivo</div>
                <div class="external-event bg-yellow">Correctivo</div>
                <div class="external-event bg-red">Urgente</div>
                 
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

                <div class="box box-success">

             <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Finalizar mantenimientos</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                  <center><a href="mmantenimiento" class="btn btn-primary">Finalizar</a></center>


                 
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>





       <div class="col-md-9">
        <div class="box box-success">

       <div  id="calendar" class="col-centered">  </div>
        </div>
      </div>
 
 
      </div>
 

    </section>
  <!-- /.content -->
</div>


                        <!-- Modal -->
            <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              <form class="form-horizontal" method="POST" action="modelos/addEvent.php">
              
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Recoradorio de Mantenimiento</h4>
              </div>
              <div class="modal-body">
                
                 
                 <div class="form-group">
                  <label for="color" class="col-sm-2 control-label">Camion / Vehiculo</label>
                  <div class="col-sm-10">
                 <select class="form-control text-uppercase" id="title" name="title" required>

                     <option value="">Seleccionar camion</option>

                     <?php

                      $respuesta = ModeloCamiones::mostrarCamionesLibre("CAMIONES");

                      foreach ($respuesta as $key => $value) {
                        // if ($value["ID_CAMIONES"] != "1") {

                        echo '<option value="' . $value["NOMBRE_CAMION"] . '">' . $value["NOMBRE_CAMION"] . '</option>';
                        // }
                      }

                      ?>

                   </select>
                  </div>
                  </div>




                <div class="form-group">
                  <label for="color" class="col-sm-2 control-label">Tipo</label>
                  <div class="col-sm-10">
                  <select name="color" class="form-control" id="color">
                      <option required value="#008000">Seleccione tipo de mantenimiento</option>
                    <option style="color:#008000;" value="#008000">&#9724; Preventivo</option>              
                    <option style="color:#FFD700;" value="#e1c900">&#9724; Correctivo</option>
                    <option style="color:#FF0000;" value="#FF0000">&#9724; Urgente</option>             
                    </select>
                  </div>
                  </div>
                  
                <div class="form-group">
                  <label for="start" class="col-sm-2 control-label">Fecha Inicial</label>
                  <div class="col-sm-10">
                  <input type="text" name="start" class="form-control" id="start" readonly>
                  </div>


                   <input type="hidden"  name="estatus" value="1">

                  </div>
                  
                  <div class="form-group">
                  <label for="Hora" class="col-sm-2 control-label">¿A que hora?</label>
                  <div class="col-sm-10">
                    <div class="input-group clockpicker" data-autoclose="true">
                      <input type="text" name="HoraI" class="form-control" id="HoraI" placeholder="Establezca la hora" required>
                    </div>
                  </div>
                </div>                
                        
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary ">Aceptar</button>
              </div>
              </form>
              </div>
            </div>
            </div>



                        <!-- Modal -->
            <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              <form class="form-horizontal" method="POST" action="modelos/editEventTitle.php">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modificar Evento</h4>
              </div>
              <div class="modal-body">
                
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Camion / Vehiculo</label>
                  <div class="col-sm-10">
                  <input type="text" name="title" class="form-control" id="title" placeholder="Titulo" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="color" class="col-sm-2 control-label">Tipo</label>
                  <div class="col-sm-10">
                  <select name="color" class="form-control" id="color">
                    <option value="">Tipo de mantenimiento</option>
                    <option style="color:#008000;" value="#008000">&#9724; preventivo</option>              
                    <option style="color:#FFD700;" value="#FFD700">&#9724; Correctivo</option>
                    <option style="color:#FF0000;" value="#FF0000">&#9724; Urgente</option>
                    
                    </select>
                  </div>
                </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label class="text-danger"><input type="checkbox"  name="delete"> Eliminar Evento</label>
                    </div>
                    </div>
                  </div>
                
                <input type="hidden" name="id" class="form-control" id="id">
                
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              </form>
              </div>
            </div>
            </div>

 <script>


          $(document).ready(function() {
            
          var date = new Date();
          var yyyy = date.getFullYear().toString();
          var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
          var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
            
            $('#calendar').fullCalendar({
              header: {
                language: 'es',
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay',

              },
              defaultDate: yyyy+"-"+mm+"-"+dd,
              editable: false, //arrastrar cintillo
              eventLimit: true, //si hay mas de eventos en el mismo dia, despliega "ver mas"
              selectable: true, //seleccionar conjunto de fechas
              selectHelper: true,
              select: function(start, end) {
                
                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD'));
                if (Date.parse(end._d) > Date.now())
                {
                $('#ModalAdd').modal('show');
                }
                else
                {
                alert('No se pueden agendar en fechas pasadas');
                }
              },
              eventRender: function(event, element) {
                element.bind('dblclick', function() {
                  $('#ModalEdit #id').val(event.id);
                  $('#ModalEdit #title').val(event.title);
                  $('#ModalEdit #color').val(event.color);
                  $('#ModalEdit').modal('show');
                });
              },    
              eventDrop: function(event, delta, revertFunc) { // si changement de position

                edit(event);

              },
              eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                edit(event);

              },
              events:  [
              <?php
                 
                foreach($events as $event): 
              
                $start = explode(" ", $event['start']);
                $end = explode(" ", $event['end']);
                if($start[1] == '00:00:00'){
                  $start = $start[0];
                }else{
                  $start = $event['start'];
                }
                if($end[1] == '00:00:00'){
                  $end = $end[0];
                }else{
                  $end = $event['end'];
                }
                  
              ?>
              
                {
                  id: '<?php echo $event['id']; ?>',
                  title: '<?php echo $event['title']; ?>',          
                  start: '<?php echo $start; ?>',
                  end: '<?php echo $end; ?>',       
                  color: '<?php echo $event['color']; ?>',

                },
              <?php endforeach; ?>
              ]
              
            });
            
            function edit(event){
              start = event.start.format('YYYY-MM-DD');
              if(event.end){
                end = event.end.format('YYYY-MM-DD');
              }else{
                end = start;
              }
              
              id =  event.id;
              
              Event = [];
              Event[0] = id;
              Event[1] = start;
              Event[2] = end;
              
              $.ajax({
              url: 'modelos/editEventDate.php',
              type: "POST",
              data: {Event:Event},
              success: function(rep) {
                  if(rep == 'OK'){
                    alert('Evento se ha guardado correctamente');
                  }else{
                    alert('No se pudo guardar. Inténtalo de nuevo.'); 
                  }
                }
              });
            }
            
          });
          $('.clockpicker').clockpicker();
        </script>

