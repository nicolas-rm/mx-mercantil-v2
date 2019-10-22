/*=============================================
EDITAR USUARIO
=============================================*/

$(".btnEditarSucursal").click(function(){ //cuando de clic traiga todo los datos del usuario

  var idSucursal = $(this).attr("idSucursal");
  
  var datos = new FormData(); //guardo los datos
  datos.append("idSucursal", idSucursal); //le asigno el id a la variable datos

  $.ajax({

    url:"ajax/sucursales.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

      $("#idSucursal").val(respuesta["id"]);
      
      $("#editarNombreS").val(respuesta["nombre"]);
      $("#editarTelefonoS").val(respuesta["telefono"]);
      $("#editarCiudadS").val(respuesta["ciudad"]);
      $("#editarDireccionS").val(respuesta["direccion"]);

    }

  });

})


