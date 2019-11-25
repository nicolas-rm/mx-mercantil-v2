<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Mercantil del Constructor SA de CV</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  <link rel="icon" href="vistas/img/plantilla/merca1.ico">

  <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <!--<link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css"> -->

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">

  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- Date Picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">





  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <script src="vistas/dist/js/modernizr.js"></script>
  <script src="vistas/dist/js/respond.js"></script>
  <script src="vistas/dist/js/push.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <script src="vistas/bower_components/jspdf/dist/jspdf.min.js"></script>
  <script src="vistas/bower_components/jspdf-autotable/dist/jspdf.plugin.autotable.js"></script>

</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->
<!-- oncontextmenu="return false"   ponerselo al body -->

<body oncontextmenu="return false" class="hold-transition skin-blue-light sidebar-mini fixed login-page">

  <?php

  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

    echo '<div class="wrapper">';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";

    /*=============================================
    CONTENIDO
    =============================================*/

    if (isset($_GET["ruta"])) {

      if (
        $_GET["ruta"] == "inicio"      || //ya esta
        $_GET["ruta"] == "salir"       || //ya esta
        $_GET["ruta"] == "perfil"      || //ya esta
        $_GET["ruta"] == "calendario"      ||
        $_GET["ruta"] == "bienvenida"      || //ya esta

        $_GET["ruta"] == "roles"       || //ya esta 
        $_GET["ruta"] == "usuarios"    || //ya esta  
        $_GET["ruta"] == "empleados"   ||

        $_GET["ruta"] == "sucursales" ||
        $_GET["ruta"] == "mantenimiento" ||
        $_GET["ruta"] == "sucursales" || //ya esta .. falta editar y eliminar .. (modulo de ricardo)
        $_GET["ruta"] == "conductores" ||
        $_GET["ruta"] == "estatus" ||
        $_GET["ruta"] == "camiones" ||
        $_GET["ruta"] == "viaje" ||
        $_GET["ruta"] == "agenda" ||
        $_GET["ruta"] == "historial" ||
        $_GET["ruta"] == "automoviles" ||
        $_GET["ruta"] == "pdf"

      ) {

        include "modulos/" . $_GET["ruta"] . ".php";
      } else {

        include "modulos/404.php";
      }
    } else {

      include "modulos/inicio.php";
    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";

    echo '</div>';
  } else {

    include "modulos/login.php";
  }

  ?>




  <script src="vistas/js/plantilla.js"></script>

  <script src="vistas/js/roles.js"></script>
  <script src="vistas/js/empleados.js"></script>
  <script src="vistas/js/usuarios.js"></script>
  <script src="vistas/js/sucursales.js"></script>


  <!-- <script src="vistas/js/plantilla.js"></script> -->
  <!-- <script src="vistas/js/roles.js"></script> -->
  <!-- <script src="vistas/js/empleados.js"></script> -->

  <!-- <script src="vistas/js/usuarios.js"></script> -->


  <!-- <script src="vistas/js/sucursales.js"></script> -->
  <script src="vistas/js/mantenimiento.js"></script>
  <script src="vistas/js/conductores.js"></script>
  <script src="vistas/js/pdf.js"></script>
  <script src="vistas/js/generatePDF.js"></script>
  <script src="vistas/js/estatus.js"></script>
  <script src="vistas/js/camiones.js"></script>
  <script src="vistas/js/viaje.js"></script>
</body>

</html>


<!-- ************** NOTAS IMPORTANTES ************** -->


<!-- 1 .. borrar comentarios de todos y ponerlos en base a su modulo ............... comentar todoooo el proyecto -->

<!-- 2 ..  Componer el menu y hacerlo fixed-->

<!-- 3 ..  convertir el calendario a mvc -->

<!-- 4. control de pedidos ..   mostrar la informacion para diferentes usuarios-->