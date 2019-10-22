/*=============================================
EDITAR USUARIO
=============================================*/

$(".btnEditarMantenimiento").click(function() { //cuando de clic traiga todo los datos del usuario

    var idMantenimiento = $(this).attr("idMantenimiento");

    var datos = new FormData(); //guardo los datos
    datos.append('idMantenimiento', idMantenimiento); //le asigno el id a la variable datos

    $.ajax({

        url: "ajax/mantenimiento.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarFechaServicio").val(respuesta["fecha_servicio"]);
            $("#editarNombreTaller").val(respuesta["nombre_taller"]);
            $("#editarkilometraje").val(respuesta["kilometraje"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarNombreMecanico").val(respuesta["nombre_mecanico"]);
            $("#editarCosto").val(respuesta["precio"]);
            $("#editarProximoServicio").val(respuesta["proximo_servicio"]);
            $("#idMantenimiento").val(respuesta["id"]);
        }

    });

});

$("#nuevoFechaServicio").change(function(){
    //Comprobamos que tenga formato correcto
    var n = new Date(); 
    var m=n.getMonth()+1;
    var d=n.getDate();
    var y=n.getFullYear();

    if (d<10) {
        d='0'+d;
    }
    if (m<10) {
        m='0'+m;
    }

    var fecha = y + "-" + m +"-" + d;

    var f = document.getElementById("nuevoFechaServicio").value;

    ms = Date.parse(f);
    n1 = new Date(ms);

    var m1=n1.getMonth()+1;
    var d1=n1.getDate()+1;
    var y1=n1.getFullYear();

    if (d1<10) {
        d1='0'+d1;
    }
    if (m1<10) {
        m1='0'+m1;
    }

    fecha2 = y1 + "-" + m1 +"-" + d1;

    if (fecha2 < fecha){
        swal({
            title: 'FECHA INCORRECTA',
            text: "La fecha debe ser igual o posterior a hoy",
            type: 'error',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Cerrar'
        }); 
        $("#nuevoFechaServicio").val( '' );
    }
});