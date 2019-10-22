/*=============================================
ELIMINAR EMPLEADO
=============================================*/
$(".btnEliminarEmpleado").click(function(){

  var idUsuario = $(this).attr("idEmpleado"); 
   

  swal({
    title: '¿Está seguro de borrar el EMPLEADO?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar empleado!'
  }).then((result)=>{

    if(result.value){

      window.location = "index.php?ruta=empleados&idEmpleado="+idUsuario ;

    }

  })

})


/*=============================================
EDITAR EMPLEADO
=============================================*/

$(".btnEditarEmpleado").click(function(){

  var idEmpleado = $(this).attr("idEmpleado");
  
  var datos = new FormData();
  datos.append("idEmpleado", idEmpleado);

  $.ajax({

    url:"ajax/empleados.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      
      $("#editarNombreE").val(respuesta["nombre"]);
      $("#editarTelefonoE").val(respuesta["telefono"]);


         
         $("#editarSucursal").val(respuesta["id_sucursal"]);
       
      $("#idEmpleado").val(respuesta["id"]);
 

    }

  });

})





