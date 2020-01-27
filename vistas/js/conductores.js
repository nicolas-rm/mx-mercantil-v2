$(function() {
    // console.log("ENTRO A DENTRO DE LA FUNCION");
    $('body').on('click', 'button.editConductor', function(e) {
        // console.log("HOLA");

        var editConductor = $(this).attr("value");
        console.log("editConductor ", editConductor);
        var datos = new FormData(); //guardo los datos
        datos.append('editConductor', editConductor); //le asigno el id a la variable datos

        $.ajax({

            url: "ajax/conductores.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                // console.log("el valor de respuesta: ");
                console.log(respuesta);
                $('#editConductor').val(respuesta["ID_CONDUCTORES"]);
                $('#editNombre').val(respuesta["NOMBRE"]);
                $('#editApellidos').val(respuesta["APELLIDOS"]);
                $('#editTelefono').val(respuesta["TELEFONO"]);
                $('#editSucursalConductores').val(respuesta["ID_SUCURSALES"]);
                // $('#editCurp').val(respuesta["CURP"]);
                // $('#editDireccion').val(respuesta["DIRECCION"]);
                $('#editNumeroLicencia').val(respuesta["NUMERO_LICENCIA"]);
                // $('#editAntiguedad').val(respuesta["ANTIGUEDAD"]);
                $('#editEstatusConductores').val(respuesta["ID_ESTATUS_CONDUCTORES"]);
            }
        });
    });
    $('body').on('click', 'button.deletConductor', function(e) {
        // console.log("HOLA");



        swal({
            title: 'Eliminar registro',
            text: "Usted no podra revertir este proceso!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Finalizar'
        }).then((result) => {
            if (result.value) {
                swal(
                    'registro eliminado!',
                    // '.',
                    // 'Aceptar',
                    // 'confirmButtonText: SI'

                ).finally(() => {

                    var deletConductor = $(this).attr("value");
                    console.log("deletConductor ", deletConductor);
                    var datos = new FormData(); //guardo los datos
                    // datos.append('', conductor); //le asigno el id a la variable datos
                    datos.append('delet', 'delet'); //le asigno el id a la variable datos
                    datos.append('deletConductor', deletConductor); //le asigno el id a la variable datos

                    $.ajax({

                        url: "ajax/conductores.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(respuesta) {
                            // console.log("el valor de respuesta: ");
                            console.log(respuesta);

                            window.location.href = 'conductores';
                            // $('#editConductor').val(respuesta["ID_CONDUCTORES"]);
                            // $('#editNombre').val(respuesta["NOMBRE"]);
                            // $('#editApellidos').val(respuesta["APELLIDOS"]);
                            // $('#editTelefono').val(respuesta["TELEFONO"]);
                            // $('#editSucursalConductores').val(respuesta["ID_SUCURSALES"]);
                            // // $('#editCurp').val(respuesta["CURP"]);
                            // // $('#editDireccion').val(respuesta["DIRECCION"]);
                            // $('#editNumeroLicencia').val(respuesta["NUMERO_LICENCIA"]);
                            // // $('#editAntiguedad').val(respuesta["ANTIGUEDAD"]);
                            // $('#editEstatusConductores').val(respuesta["ID_ESTATUS_CONDUCTORES"]);
                        }
                    });
                });
            }
        })
    });
});