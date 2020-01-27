/*=============================================
EDITAR SUCURSAL
=============================================*/

$(".btnEditarSucursal").click(function(){

  var idSucursal = $(this).attr("idSucursal");
  
  var datos = new FormData();
  datos.append("idSucursal", idSucursal);

  $.ajax({

    url:"ajax/sucursales.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      
      $("#editarNombreS").val(respuesta["nombre"]);
      $("#editarTelefonoS").val(respuesta["telefono"]);
      $("#editarCiudadS").val(respuesta["ciudad"]);
      $("#editarDireccionS").val(respuesta["direccion"]);

      $("#idSucursal").val(respuesta["id"]);
 

    }

  });

})



$(".btnEliminarSucursal").click(function(){

  var idSucursal = $(this).attr("idSucursal");

  swal({
    title: 'Eliminar registro',
    text: "Usted no podra revertir este proceso!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, eliminar registro!'
  }).then((result)=>{

    if(result.value){

      

      window.location = "index.php?ruta=sucursales&idSucursal="+idSucursal;

    }

  })

})

