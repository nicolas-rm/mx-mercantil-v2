

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vale de Gasolina
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Vale</li>
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Nota:</h4>
        Generar para realizar carga de combustible.
      </div>
    </div>

    <body onload="window.print();">

    <!-- Main content -->
    <section class="invoice" id="target">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-car"></i> Mercantil del Constructor S.A. de C.V.
            <small class="pull-right">Folio: ________________________________________</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">

        <div class="col-sm-4 invoice-col">
          Conductor:
          <address>
            <strong>___________________________________</strong><br>
            
          </address>
        </div>
        <center> 
        <div class="col-sm-4 invoice-col">
          Fecha:
          <address>
            <strong>____________________</strong><br>
            
          </address>
        </div></center>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Sucursal
          <address>
             <strong>___________________________________</strong><br>
          </address>
        </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->


      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-5">
          
          <center> <img src="vistas/img/plantilla/MC.png" alt="Visa"> </center>

         <center><p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Vale Generado y Unico por Mercantil del Constructor S.A. de C.V.
          </p></center>
        </div>
        <!-- /.col -->
        <div class="col-xs-7">
          <p class="lead">Descripcion</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Vale por:</th>
                <td>____________________</td>
              </tr>
              <tr>
                <th>Cantidad cargada: </th>
                <td>____________________</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$___________________</td>
              </tr>
              <tr>
                <th>Nombre y Firma autorizada:</th>
                <td>______________________________________</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
     
    </section>
    </body>

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <center><a href="vale" class="btn btn-primary"><i class="fa fa-download"></i> Descargar</a></center>
          <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button> -->
          <!-- <button id="cmd" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Imprimir</button> -->
          <!-- <button id="cmd">Imprimir</button> -->
        </div>
      </div>
  </div>

