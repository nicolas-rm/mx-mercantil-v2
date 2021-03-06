/*=============================================
EDITAR USUARIO
=============================================*/

$(function() {
    // console.log("ENTRO A DENTRO DE LA FUNCION");
    $('body').on('click', 'button.btnEditarMantenimiento', function(e) {
        // console.log("HOLA");

        var idMantenimiento = $(this).attr("value");

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


    $('body').on('click', '#unpdf', function(e) {
        var fecha = new Date();
    // alert("Día: " + fecha.getDate() + "\nMes: " + (fecha.getMonth() + 1) + "\nAño: " + fecha.getFullYear());
    // alert("Hora: " + fecha.getHours() + "\nMinuto: " + fecha.getMinutes() + "\nSegundo: " + fecha.getSeconds() + "\nMilisegundo: " + fecha.getMilliseconds()); 
    { /* </script> */ }
    /* CREA UNA VARIABLE COMO REQUERIMIENTO */

    var nombre = "Camiones - " + fecha.getDate() + "-" + (fecha.getMonth() + 1) + "-" + fecha.getFullYear() + "-" + fecha.getHours() + "" + fecha.getMinutes() + "" + fecha.getSeconds() + ".pdf";
    var datos = new FormData();
        // console.log("HOLA");

        console.log("MANTENIMIENTO");
        // var valorEstatus = $(this).text();
        var idPDFmantenimientoUnique = $(this).attr("value");
        // console.log("ESTATUS ENTRANTE", $(this).text());
        console.log("id", idPDFmantenimientoUnique);


        var datos = new FormData(); //guardo los datos
        datos.append('PDFMANTENIMIENTO', "PDFMANTENIMIENTO"); //le asigno el id a la variable datos
        datos.append('idPDFmantenimientoUnique', idPDFmantenimientoUnique); //le asigno el id a la variable datos
        // datos.append('idCamion', idCamion); //le asigno el id a la variable datos

            $.ajax({
        /* LUGAR A DONDE SERAN ENVIADO LOS DATOS */
        url: "ajax/pdf.ajax.php",
        /* TIPO DE METODO POR EL CUAL SERA RECIVIDO */
        method: "POST",
        /* DATOS ENVIADOS COMO PARAMETROS */
        data: datos,
        /* GENERACION DE DATOS DEL NAVEGADOR */
        cache: false,
        contentType: false,
        processData: false,
        /* TIPO DE ARCHIVO A TRAVES DE LA WEB */
        dataType: "json",
        /* LO QUE DEVOLVERA DEL LUGAR A DONDE LO RECIVEN */
        success: function(respuesta) {
            /* INSTANCIA DE OBJETO O VARIABLE CON EL TIPO DE DATO DEL JSPDF (PLUGIN) */
            var pdf = new jsPDF("l", "mm", "a4");
            /* TEXTO PRINCIPAL (CABEcera) */
            // pdf.text(20, 20, "Mostrando una Tabla con JsPDF");

            var header = function(data) {
                pdf.setTextColor(252, 23, 0 );
                pdf.text(90, 20,"  MERCANTIL DEL CONSTRUCTOR S.A DE C.V  ");
                pdf.setTextColor(0, 0, 0);
                pdf.setFont('helvetica');
                pdf.setFontType('bold');
                pdf.text(100, 30, ' CONTROL DE SERVICIO VEHICULAR ');
               var imgData = ("data:image/jpeg;base64,iVBORw0KGgoAAAANSUhEUgAAANcAAACCCAYAAADVPl3xAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo3RUUxREY0RERFMDBFMjExOTgyNUVEQzgwNzJENDQ4OSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDozNDcwQ0Q3NjRGN0IxMUUyOTZFODg0MUNDQzRCRjFCMiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDozNDcwQ0Q3NTRGN0IxMUUyOTZFODg0MUNDQzRCRjFCMiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDNzY2RDc1NjI3MDNFMjExQTU1Q0ZGREM5NTBFMjM4MiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo3RUUxREY0RERFMDBFMjExOTgyNUVEQzgwNzJENDQ4OSIvPiA8L3JkZjpEZXNjcmlwdGlv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");
                pdf.addImage(imgData, "JPEG", 26, 10, 40, 30);
              var imgData1 = ("data:image/jpeg;base64,iVBORw0KGgoAAAANSUhEUgAAANcAAACCCAYAAADVPl3xAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo3RUUxREY0RERFMDBFMjExOTgyNUVEQzgwNzJENDQ4OSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDozNDcwQ0Q3NjRGN0IxMUUyOTZFODg0MUNDQzRCRjFCMiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDozNDcwQ0Q3NTRGN0IxMUUyOTZFODg0MUNDQzRCRjFCMiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDNzY2RDc1NjI3MDNFMjExQTU1Q0ZGREM5NTBFMjM4MiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo3RUUxREY0RERFMDBFMjExOTgyNUVEQzgwNzJENDQ4OSIvPiA8L3JkZjpEZXNjcmlwdGlv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");
                pdf.addImage(imgData, "JPEG", 230, 10, 40, 30);

                // 
            };
           
            /* COLUMNAS DE LA TABLA Y SUS NOMBRES */
             var columns = [
                "PROCEDENCIA",
                "CHOFER",
                "CAMION",
                "TALLER",
                "KILOMETRAJE",
                "DESCRIPCION",
                "MECANICO",
                "PRECIO"
            ];
            /* ARRAY PARA ALMACENAR LOS DATOS */
            var data = [];

            /* TIPO ARRAY - OBJETO  */
            console.log("DATA");
            console.log(data);

            /* TIPO ARRAY - OBJETO */
            console.log("RESPUESTA");
            console.log(respuesta);


            /* SE AGREGAN UNO POR UNO AL ARRAY */
            for (let index = 0; index < respuesta.length; index++) {
                // if (respuesta[index].ID_ESTATUS_CONDUCTORES.toString() != "INACTIVO") {
                //     da
                // if (respuesta[index].ID_ESTATUS_CONDUCTORES.toString() != "INACTIVO") {
                // data[index] = (index + 1);
                
                data.push(respuesta[index]);
                // }
                // }
            };
            /* AL TERMINAR DE AGREGAR SE VUELVE ARRAY - OBJETO */

            // for (let index = 0; index < data.length; index++) {
            //     if (respuesta[index].ID_ESTATUS_CONDUCTORES.toString() == "INACTIVO") {
            //         data.pop(data[index]);
            //     }
            //     // data.push(respuesta[index]);
            // };

            console.log("DESPUES DE POP");
            console.log(data);
            

          pdf.autoTable(columns, data, { margin: { top: 50 }, didDrawPage: header });
            const pageCount = pdf.internal.getNumberOfPages();
            for (var i = 1; i <= pageCount; i++) {
                // Go to page i
                pdf.setPage(i);
                //Print Page 1 of 4 for example
                pdf.text('Pagina ' + String(i) + ' de ' + String(pageCount), 165 - 10, 220 - 20, null, null, "center");
            };
            
            pdf.save(nombre);

          
        }
    });
});
});

// $(".btnEditarMantenimiento").click(function() { //cuando de clic traiga todo los datos del usuario


$("#nuevoFechaServicio").change(function() {
    //Comprobamos que tenga formato correcto
    var n = new Date();
    var m = n.getMonth() + 1;
    var d = n.getDate();
    var y = n.getFullYear();

    if (d < 10) {
        d = '0' + d;
    }
    if (m < 10) {
        m = '0' + m;
    }

    var fecha = y + "-" + m + "-" + d;

    var f = document.getElementById("nuevoFechaServicio").value;

    ms = Date.parse(f);
    n1 = new Date(ms);

    var m1 = n1.getMonth() + 1;
    var d1 = n1.getDate() + 1;
    var y1 = n1.getFullYear();

    if (d1 < 10) {
        d1 = '0' + d1;
    }
    if (m1 < 10) {
        m1 = '0' + m1;
    }

    fecha2 = y1 + "-" + m1 + "-" + d1;

    if (fecha2 < fecha) {
        swal({
            title: 'FECHA INCORRECTA',
            text: "La fecha debe ser igual o posterior a hoy",
            type: 'error',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Cerrar'
        });
        $("#nuevoFechaServicio").val('');
    }
});


  // $('body').on('click', '#finalizar', function(e) {

  //       swal({
  //           title: 'Desea Finalizar EL Mantenimiento?',
  //           text: "Usted no podra revertir este proceso!",
  //           type: 'warning',
  //           showCancelButton: true,
  //           confirmButtonColor: '#3085d6',
  //           cancelButtonColor: '#d33',
  //           confirmButtonText: 'Finalizar'
  //       }).then((result) => {
  //           if (result.value) {
  //               var idCamion = document.getElementById('finalizar').value;
  //               // var a = 
  //               // console.log("A: ", a);


  //               var datos = new FormData(); //guardo los datos
  //               datos.append('valorEstatusActual', 'Disponible'); //le asigno el id a la variable datos
  //               datos.append('idCamion', idCamion); //le asigno el id a la variable datos

  //               $.ajax({

  //                   url: "ajax/camiones.ajax.php",
  //                   method: "POST",
  //                   data: datos,
  //                   cache: false,
  //                   contentType: false,
  //                   processData: false,
  //                   dataType: "json",
  //                   success: function(respuesta) {
  //                       // console.log("el valor de respuesta: ");
  //                       console.log(respuesta);
  //                   }
  //               });


  //               swal(
  //                   'mantenimiento finalizado!',
  //                   // '.',
  //                   // 'Aceptar',
  //                   // 'confirmButtonText: SI'

  //               ).finally(() => {

  //                   var idViaje = document.getElementById('viajeFin').getAttribute('idMantenimiento');
  //                   // var a = 
  //                   // console.log("A: ", a);
  //                   console.log("EL VALOR DE idMantenimiento: ", idMantenimiento);

  //                   var datos = new FormData(); //guardo los datos
  //                   datos.append('EstatusViaje', 'EstatusViaje'); //le asigno el id a la variable datos
  //                   datos.append('idViaje', idViaje); //le asigno el id a la variable datos
  //                   $.ajax({

  //                       url: "ajax/mantenimiento.ajax.php",
  //                       method: "POST",
  //                       data: datos,
  //                       cache: false,
  //                       contentType: false,
  //                       processData: false,
  //                       dataType: "json",
  //                       success: function(respuesta) {
  //                           // console.log("el valor de respuesta: ");
  //                           console.log(respuesta);

  //                           window.location.href = 'agenda';
  //                       }
  //                   });
  //               });
  //           }
  //       })
  //   });

// });