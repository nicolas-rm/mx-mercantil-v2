$(function() {
    // console.log("ENTRO A DENTRO DE LA FUNCION");
    $('body').on('click', '#estatusEdit', function(e) {
        // console.log("HOLA");

        var estatusEdit = $(this).attr("value");
        var tablaEdit = $(this).attr("data");
        console.log("estatusEdit ", estatusEdit);
        console.log("estatusEdit ", estatusEdit);
        console.log("tablaEdit", tablaEdit);
        var datos = new FormData(); //guardo los datos
        datos.append('estatusEdit', estatusEdit); //le asigno el id a la variable datos
        datos.append('tablaEdit', tablaEdit); //le asigno el id a la variable datos

        $.ajax({
            url: "ajax/estatus.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                // console.log("el valor de respuesta: ");
                console.log(respuesta);
                // $('#editEstatus').val(respuesta["editEstatus"]);
                // $('#estatusEstatusNombre').val(respuesta["DESCRIPCION"]);
                // $('#editApellidos').val(respuesta["APELLIDOS"]);
                // $('#editFechaNacimiento').val(respuesta["FECHA_NACIMIENTO"]);
                // $('#editCurp').val(respuesta["CURP"]);
                // $('#editDireccion').val(respuesta["DIRECCION"]);
                // $('#editNumeroLicencia').val(respuesta["NUMERO_LICENCIA"]);
                // $('#editAntiguedad').val(respuesta["ANTIGUEDAD"]);
                // $('#editEstatusConductores').val(respuesta["ID_ESTATUS_CONDUCTORES"]);
            }
        });
    });
});