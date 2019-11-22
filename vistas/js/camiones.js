$('body', function() {
    $('body').on('click', 'button.editCamiones', function(e) {
        // console.log("HOLA");

        // var valorEstatus = $(this).text();
        var idCamion = $(this).attr("id");
        // console.log("ESTATUS ENTRANTE", $(this).text());
        console.log("id", idCamion);


        var datos = new FormData(); //guardo los datos
        datos.append('idCamion', idCamion); //le asigno el id a la variable datos
        datos.append('editCamiones', 'editCamiones'); //le asigno el id a la variable datos
        // datos.append('idCamion', idCamion); //le asigno el id a la variable datos

        $.ajax({

            url: "ajax/camiones.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                // console.log("el valor de respuesta: ");
                console.log(respuesta);
                $('#editCamiones').val(respuesta["ID_CAMIONES"]);
                $('#editDescripcion').val(respuesta["DESCRIPCION"]);
                $('#editNumSerie').val(respuesta["NUMERO_SERIE"]);
                $('#editPlacas').val(respuesta["NUMERO_PLACAS"]);
                $('#editNombreCamion').val(respuesta["NOMBRE_CAMION"]);
                $('#editModelo').val(respuesta["MODELO"]);
                // $('#editTipoCamiones').val(respuesta["TIPO_CAMION"]);
                // $('#editConductorCamiones').val(respuesta["ESTATUS_CAMIONES"]);
                // $('#editApellidos').val(respuesta["ESTATUS_CAMIONES"]);
                // $('#editTelefono').val(respuesta["TELEFONO"]);
                // // $('#editFechaNacimiento').val(respuesta["FECHA_NACIMIENTO"]);
                // // $('#editCurp').val(respuesta["CURP"]);
                // // $('#editDireccion').val(respuesta["DIRECCION"]);
                // $('#editNumeroLicencia').val(respuesta["NUMERO_LICENCIA"]);
                // // $('#editAntiguedad').val(respuesta["ANTIGUEDAD"]);
                // // $('#editEstatusConductores').val(respuesta["ID_ESTATUS_CONDUCTORES"]);
            }
        });
    });


    $('body').on('click', '#pdfCamiones', function(e) {
        // console.log("HOLA");

        // var valorEstatus = $(this).text();
        var idPDFCamionesUnique = $(this).attr("value");
        // console.log("ESTATUS ENTRANTE", $(this).text());
        // console.log("id", idCamion);


        var datos = new FormData(); //guardo los datos
        datos.append('unique', "unique"); //le asigno el id a la variable datos
        datos.append('idPDFCamionesUnique', idPDFCamionesUnique); //le asigno el id a la variable datos
        // datos.append('idCamion', idCamion); //le asigno el id a la variable datos

        $.ajax({

            url: "ajax/pdf.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                // console.log("el valor de respuesta: ");
                console.log(respuesta);
                // $('#editCamiones').val(respuesta["ID_CAMIONES"]);
                // $('#editDescripcion').val(respuesta["DESCRIPCION"]);
                // $('#editNumSerie').val(respuesta["NUMERO_SERIE"]);
                // $('#editPlacas').val(respuesta["NUMERO_PLACAS"]);
                // $('#editNombreCamion').val(respuesta["NOMBRE_CAMION"]);
                // $('#editModelo').val(respuesta["MODELO"]);
                // $('#editTipoCamiones').val(respuesta["TIPO_CAMION"]);
                // $('#editConductorCamiones').val(respuesta["ESTATUS_CAMIONES"]);
                // $('#editApellidos').val(respuesta["ESTATUS_CAMIONES"]);
                // $('#editTelefono').val(respuesta["TELEFONO"]);
                // // $('#editFechaNacimiento').val(respuesta["FECHA_NACIMIENTO"]);
                // // $('#editCurp').val(respuesta["CURP"]);
                // // $('#editDireccion').val(respuesta["DIRECCION"]);
                // $('#editNumeroLicencia').val(respuesta["NUMERO_LICENCIA"]);
                // // $('#editAntiguedad').val(respuesta["ANTIGUEDAD"]);
                // // $('#editEstatusConductores').val(respuesta["ID_ESTATUS_CONDUCTORES"]);
            }
        });
    });

    $('body').on('click', 'button.estatusCamiones', function(e) {
        // console.log("HOLA");

        var valorEstatus = $(this).text();
        var idCamion = $(this).attr("id");
        console.log("ESTATUS ENTRANTE", $(this).text());
        console.log("idCamion", idCamion);


        // console.log($(this));

        if (valorEstatus === "Disponible") {
            $(this).removeClass('btn-success');
            $(this).addClass('btn-warning');
            $(this).text("Mantenimiento");
        } else if (valorEstatus === "Mantenimiento") {
            $(this).removeClass('btn-warning');
            $(this).addClass('btn-danger');
            $(this).text("Repartiendo");
        } else if (valorEstatus === "Repartiendo") {
            $(this).removeClass('btn-danger');
            $(this).addClass('btn-primary');
            $(this).text("Cargado");
        } else {
            $(this).removeClass('btn-primary');
            $(this).addClass('btn-success');
            $(this).text("Disponible");
        }

        var valorEstatusActual = $(this).text();
        var idCamion = $(this).attr("id");
        console.log("ESTATUS ACTUAL", valorEstatusActual);
        console.log("idCamion", idCamion);
        /*  var editConductor = $(this).text();
         var id = $(this).attr("id");
         console.log("ESTATUS", $(this).text());
         console.log("ID", id); */


        // if (estadoUsuario == 0) {
        //     $(this).removeClass("btn-success");
        //     $(this).addClass("btn-danger");
        //     $(this).html("Desactivado");
        //     $(this).attr("estadoUsuario", 1);
        // } else {
        //     $(this).addClass("btn-success");
        //     $(this).removeClass("btn-danger");
        //     $(this).html("Activado");
        //     $(this).attr("estadoUsuario", 0);
        // }
        var datos = new FormData(); //guardo los datos
        datos.append('valorEstatusActual', valorEstatusActual); //le asigno el id a la variable datos
        datos.append('idCamion', idCamion); //le asigno el id a la variable datos

        $.ajax({

            url: "ajax/camiones.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                // console.log("el valor de respuesta: ");
                console.log(respuesta);
                // $('#editConductor').val(respuesta["ID_CONDUCTORES"]);
                // $('#editNombre').val(respuesta["NOMBRE"]);
                // $('#editApellidos').val(respuesta["APELLIDOS"]);
                // $('#editTelefono').val(respuesta["TELEFONO"]);
                // // $('#editFechaNacimiento').val(respuesta["FECHA_NACIMIENTO"]);
                // // $('#editCurp').val(respuesta["CURP"]);
                // // $('#editDireccion').val(respuesta["DIRECCION"]);
                // $('#editNumeroLicencia').val(respuesta["NUMERO_LICENCIA"]);
                // // $('#editAntiguedad').val(respuesta["ANTIGUEDAD"]);
                // // $('#editEstatusConductores').val(respuesta["ID_ESTATUS_CONDUCTORES"]);
            }
        });

        var valorEstatusActual = $(this).text();
        var idCamion = $(this).attr("id");
        console.log("ESTATUS ACTUAL", valorEstatusActual);
        console.log("idCamion", idCamion);
        if (valorEstatus === "Disponible") {
            $(this).removeClass('btn-success');
            $(this).addClass('btn-warning');
            $(this).text("Mantenimiento");
        } else if (valorEstatus === "Mantenimiento") {
            $(this).removeClass('btn-warning');
            $(this).addClass('btn-danger');
            $(this).text("Repartiendo");
        } else if (valorEstatus === "Repartiendo") {
            $(this).removeClass('btn-danger');
            $(this).addClass('btn-primary');
            $(this).text("Cargado");
        } else {
            $(this).removeClass('btn-primary');
            $(this).addClass('btn-success');
            $(this).text("Disponible");
        }

    });

});

$('#nuevoTipoCamiones').change(function() {
    var val = $("#nuevoTipoCamiones option:selected").text();
    //     var operation = document.getElementById("nuevoTipoCamiones").value;

    //     /* PONER OPTIONES A UN SELECT
    //     select = document.getElementById("nuevoEstatusCamiones");
    //     option = document.createElement("option");
    //     option.value = "1";
    //     option.text = "hola mundo";
    //     select.appendChild(option); */

    // console.log("EL VALOR DE VAL: ", val);
    //     // console.log("EL VALOR DE OPERATION: ", operation);
    if (document.getElementById("nuevoTipoCamiones").value.toString() == "Automovil" ||
        document.getElementById("nuevoTipoCamiones").value.toString() == "Camioneta") {
        // $("#estatus").hidden();
        $('#conductor').addClass('hidden');
        // $('#pertenencia').removeClass('hidden');
        // console.log("HOLA MUNDO");
    } else {
        // $("#email").hide();
        // $('#pertenencia').addClass('hidden');
        $('#conductor').removeClass('hidden');
    }
    // });
});
$('#editTipoCamiones').change(function() {
    var val = $("#editTipoCamiones option:selected").text();
    //     var operation = document.getElementById("nuevoTipoCamiones").value;

    //     /* PONER OPTIONES A UN SELECT
    //     select = document.getElementById("nuevoEstatusCamiones");
    //     option = document.createElement("option");
    //     option.value = "1";
    //     option.text = "hola mundo";
    //     select.appendChild(option); */

    // console.log("EL VALOR DE VAL: ", val);
    //     // console.log("EL VALOR DE OPERATION: ", operation);
    if (document.getElementById("editTipoCamiones").value.toString() == "Automovil" ||
        document.getElementById("editTipoCamiones").value.toString() == "Camioneta") {
        // $("#estatus").hidden();
        $('#editconductor').addClass('hidden');
        // $('#pertenencia').removeClass('hidden');
        // console.log("HOLA MUNDO");
    } else {
        // $("#email").hide();
        // $('#pertenencia').addClass('hidden');
        $('#editconductor').removeClass('hidden');
    }
    // });
});