/*=============================================
REVISAR SI EL ROL YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoRol").change(function(){

  $(".alert").remove();

  var usuario = $(this).val();

  var datos = new FormData();
  datos.append("validarRol", usuario);

   $.ajax({
      url:"ajax/roles.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){
        
        if(respuesta){

          $("#nuevoRol").parent().after('<div class="alert alert-warning">Este rol ya existe en la base de datos</div>');

          $("#nuevoRol").val("");

        }

      }

  })
})



/*=============================================
ELIMINAR ROL
=============================================*/
$(".btnEliminarRol").click(function(){

  var idRol = $(this).attr("idRol");

  swal({
    title: '¿Está seguro de borrar el rol?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar rol!'
  }).then((result)=>{

    if(result.value){

      

      window.location = "index.php?ruta=roles&idRol="+idRol;

    }

  })

})

/*=============================================
EDITAR ROL
=============================================*/

$(".btnEditarRol").click(function(){

  var idRol = $(this).attr("idRol");
  
  var datos = new FormData();
  datos.append("idRol", idRol);

  $.ajax({

    url:"ajax/roles.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      
      $("#editarRol").val(respuesta["nombre"]);
      $("#idRol").val(respuesta["id"]);
 

    }

  });

})






