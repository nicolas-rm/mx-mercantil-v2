$(function() {



    // console.log("ENTRO A DENTRO DE LA FUNCION");
    $('body').on('change', '#nuevoFechaViaje', function(e) {
        // console.log("HOLA");
        // $(".nuevaFoto").change(function () {

        console.log("HOLA SI ENTRO");
        var Fecha_aux = document.getElementById("nuevoFechaViaje").value.split("-");

        var Fecha1 = new Date(parseInt(Fecha_aux[0]), parseInt(Fecha_aux[1] - 1), parseInt(Fecha_aux[2]));
        console.log("Fecha_aux: ", Fecha_aux);
        console.log("Fecha1: ", Fecha1);
        /* posiciones */
        /* 0 - año*/
        /* 1 - mes*/
        /* 2 - dia*/

        // document.getElementById('pedido').disabled = true;
        // if (isNaN(Fecha1)) {
        //     alert("Fecha introducida incorrecta");
        //     return false;
        // } else {
        //     alert("La fecha que has introducido es " + Fecha1);
        // }

        var fecha = new Date();
        var año = fecha.getFullYear();
        var mes = (fecha.getMonth() + 1);
        var dia = fecha.getDate();
        console.log("año: ", año);
        console.log("mes: ", mes);
        console.log("dia: ", dia);


        if (Fecha_aux[0] == año || Fecha_aux[0] > año) {
            document.getElementById('pedido').disabled = false;
            if (Fecha_aux[1] == mes || Fecha_aux[1] > mes) {
                document.getElementById('pedido').disabled = false;
                if (Fecha_aux[2] == dia || Fecha_aux[2] > dia) {
                    document.getElementById('pedido').disabled = false;
                } else {
                    swal({
                        title: "Verifique la fecha",
                        text: "",
                        type: "error",
                        confirmButtonText: "Cerrar"

                    });
                    document.getElementById('pedido').disabled = true;
                }
            } else {
                swal({
                    title: "Verifique la fecha",
                    // text: "¡La imagen no debe pesar más de 2MB!",
                    type: "error",
                    confirmButtonText: "Cerrar"

                });
                document.getElementById('pedido').disabled = true;
            }
        } else {
            swal({
                title: "Verifique la fecha",
                // text: "¡La imagen no debe pesar más de 2MB!",
                type: "error",
                confirmButtonText: "Cerrar"
            });
            document.getElementById('pedido').disabled = true;
        }

    });


    $('body').on('click', 'button.viajeFin', function(e) {

        swal({
            title: 'Desea Finalizar EL Reparto?',
            text: "Usted no podra revertir este proceso!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Finalizar'
        }).then((result) => {
            if (result.value) {
                var idCamion = document.getElementById('viajeFin').value;
                // var a = 
                // console.log("A: ", a);


                var datos = new FormData(); //guardo los datos
                datos.append('valorEstatusActual', 'Disponible'); //le asigno el id a la variable datos
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
                    }
                });


                swal(
                    'Reparto Finalizado!',
                    // '.',
                    // 'Aceptar',
                    // 'confirmButtonText: SI'

                ).finally(() => {

                    var idViaje = document.getElementById('viajeFin').getAttribute('idViaje');
                    // var a = 
                    // console.log("A: ", a);
                    console.log("EL VALOR DE idViaje: ", idViaje);

                    var datos = new FormData(); //guardo los datos
                    datos.append('EstatusViaje', 'EstatusViaje'); //le asigno el id a la variable datos
                    datos.append('idViaje', idViaje); //le asigno el id a la variable datos
                    $.ajax({

                        url: "ajax/viajes.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(respuesta) {
                            // console.log("el valor de respuesta: ");
                            console.log(respuesta);

                            window.location.href = 'agenda';
                        }
                    });
                });
            }
        })
    });
});