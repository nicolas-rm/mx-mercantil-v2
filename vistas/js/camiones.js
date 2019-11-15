$(function() {
    // console.log("ENTRO A DENTRO DE LA FUNCION");
    // $('body'),
    // function(e) {
    // console.log($(this).estatus);
    // var estatus = $(".estatusCamiones");

    // for (let index = 0; index < estatus.length; index++) {
    // var estatus = $(".estatusCamiones")[index];
    // const element = array[index];
    // var s = estatus();
    // console.log(s);
    // if (estatus === "Disponible") {
    //     // $('#estatusCamiones').removeClass('btn-success');
    //     $('.estatusCamiones').addClass('btn-success');
    //     // $('#estatusCamiones').text("Mantenimiento");
    // } else if (estatus === "Mantenimiento") {
    //     // $('#estatusCamiones').removeClass('btn-warning');
    //     $('.estatusCamiones').addClass('btn-warning');
    //     // $('#estatusCamiones').text("Disponible");
    // }
    // }


    // console.log(estatus);
    // };
    $('body').on('click', 'button.estatusCamiones', function(e) {
        // console.log("HOLA");

        var editConductor = $(this).text();
        var id = $(this).attr("id");
        console.log("ESTATUS", $(this).text());
        console.log("ID", id);


        // console.log($(this));

        if (editConductor === "Disponible") {
            $(this).removeClass('btn-success');
            $(this).addClass('btn-warning');
            $(this).text("Mantenimiento");
        } else if (editConductor === "Mantenimiento") {
            $(this).removeClass('btn-warning');
            $(this).addClass('btn-danger');
            $(this).text("Repartiendo");
        } else if (editConductor === "Repartiendo") {
            $(this).removeClass('btn-danger');
            $(this).addClass('btn-primary');
            $(this).text("Cargado");
        } else {
            $(this).removeClass('btn-primary');
            $(this).addClass('btn-success');
            $(this).text("Disponible");
        }

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
        // var datos = new FormData(); //guardo los datos
        // datos.append('ESTATUS_CAMIONES', estatus); //le asigno el id a la variable datos

        // $.ajax({

        //     url: "ajax/estatus.ajax.php",
        //     method: "POST",
        //     data: datos,
        //     cache: false,
        //     contentType: false,
        //     processData: false,
        //     dataType: "json",
        //     success: function(respuesta) {
        //         // console.log("el valor de respuesta: ");
        //         console.log(respuesta);
        //         // $('#editConductor').val(respuesta["ID_CONDUCTORES"]);
        //         // $('#editNombre').val(respuesta["NOMBRE"]);
        //         // $('#editApellidos').val(respuesta["APELLIDOS"]);
        //         // $('#editTelefono').val(respuesta["TELEFONO"]);
        //         // // $('#editFechaNacimiento').val(respuesta["FECHA_NACIMIENTO"]);
        //         // // $('#editCurp').val(respuesta["CURP"]);
        //         // // $('#editDireccion').val(respuesta["DIRECCION"]);
        //         // $('#editNumeroLicencia').val(respuesta["NUMERO_LICENCIA"]);
        //         // // $('#editAntiguedad').val(respuesta["ANTIGUEDAD"]);
        //         // // $('#editEstatusConductores').val(respuesta["ID_ESTATUS_CONDUCTORES"]);
        //     }
        // });
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