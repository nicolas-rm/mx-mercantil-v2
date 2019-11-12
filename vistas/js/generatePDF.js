/* SE CREA UN EVENTO COMPLETO LA CUAL GENERA UNA FUNCION  */
$('body').on('click', '#Generar', function(e) {

    // <script language="javascript">
    var fecha = new Date();
    // alert("Día: " + fecha.getDate() + "\nMes: " + (fecha.getMonth() + 1) + "\nAño: " + fecha.getFullYear());
    // alert("Hora: " + fecha.getHours() + "\nMinuto: " + fecha.getMinutes() + "\nSegundo: " + fecha.getSeconds() + "\nMilisegundo: " + fecha.getMilliseconds()); 
    { /* </script> */ }
    /* CREA UNA VARIABLE COMO REQUERIMIENTO */

    var nombre = "Camiones - " + fecha.getDate() + "-" + (fecha.getMonth() + 1) + "-" + fecha.getFullYear() + "-" + fecha.getHours() + "" + fecha.getMinutes() + "" + fecha.getSeconds() + ".pdf";
    var datos = new FormData();
    /* SE GUARDA EL VALOR DE LA VARIABLE Y COMO SERA TRASMITIDA / ENCONTRADA */
    datos.append('PDFJS', "PDFJS");

    /* SE CREA UNA FUNCION O UN EVENTO DE TIPO AJAX */
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
            var pdf = new jsPDF();
            /* TEXTO PRINCIPAL (CABEcera) */
            pdf.text(20, 20, "Mostrando una Tabla con JsPDF");

            /* COLUMNAS DE LA TABLA Y SUS NOMBRES */
            var columns = [
                "ID",
                "NOMBRE",
                "APELLIDOS",
                "NUMERO LICENCIA",
                "ESTATUS"
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
                respuesta[index][0] = (index + 1);
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
            /* YA AGREGADOS SE SELECCIONAN LOS DATOS QUE SE VAN MOSTRAR */
            // for (let index = 0; index < respuesta.length; index++) {
            //     data[index][0] = (index + 1);
            //     /* EL NUMERO INDICA LA COLUMNA EN DONDE SE MOSTRARA */
            //     /* -------------> DESPUES DEL PUNTO DEBE DE IR EL NOMBRE (IGUAL QUE LA COLUMNA DE LA BD)*/
            //     data[index][1] = respuesta[index].NOMBRE;
            //     data[index][2] = respuesta[index].APELLIDOS;
            //     data[index][3] = respuesta[index].NUMERO_LICENCIA;
            //     data[index][4] = respuesta[index].ANTIGUEDAD;
            //     data[index][5] = respuesta[index].ID_ESTATUS_CONDUCTORES;

            // }

            // for (let index = 0; index < data.length; index++) {
            //     // const element = array[index];
            //     if (data[index][5].ID_ESTATUS_CONDUCTORES.toString() == "INACTIVO") {
            //         data.pop(data[index]);
            //     }
            // }

            pdf.autoTable(columns, data, { margin: { top: 25 } });
            pdf.save(nombre);

            /*  ---------> NOTA IMPORTANTE, ESTOS DATOS SON LOS DATOS A MOSTRAR EN TIPO OBJETO (LLAVES FORANEAS) <---------*/
            // console.log("PRUEBAS INDIVIDUALES ARRAY - OBJECTO");
            /* PRUEBAS DE COMO QUITAR LOS DATOS QUE NO SE USAN */
            // for (let index = 0; index < respuesta.length; index++) {
            //     /*  */
            //     console.log("****************");
            //     console.log(respuesta[index].NOMBRE);
            //     /*  */
            //     console.log(respuesta[index].APELLIDOS);
            //     /*  */
            //     console.log(respuesta[index].NUMERO_LICENCIA);
            //     /*  */
            //     console.log(respuesta[index].ANTIGUEDAD);
            //     /*  */
            //     console.log(respuesta[index].ID_ESTATUS_CONDUCTORES); CONTIENE EL NOMBRE DE SU RESPECTIVO ID

            // }

            /*  ---------> NOTA IMPORTANTE, ESTOS DATOS SON LOS DATOS ORIGINALES EN TIPO ARRAY (NO LLAVES FORANEAS)<---------*/
            // console.log("PRUEBAS INDIVIDUALES ARRAY");
            /* PRUEBAS DE COMO QUITAR LOS DATOS QUE NO SE USAN */
            // for (let index = 0; index < respuesta.length; index++) {
            //     /*  */
            //     console.log("****************");
            //     console.log(respuesta[index][0]);
            //     /*  */
            //     console.log(respuesta[index][1]);
            //     /*  */
            //     console.log(respuesta[index][2]);
            //     /*  */
            //     console.log(respuesta[index][3]);
            //     /*  */
            //     console.log(respuesta[index][4]);
            //     /*  */
            //     console.log(respuesta[index][5]);
            //     /*  */
            //     console.log(respuesta[index][6]);
            //     /*  */
            //     console.log(respuesta[index][7]);
            //     /*  */
            //     console.log(respuesta[index][8]);
            //     /*  */
            //     // console.log(respuesta[index][4]);

            // }
        }
    });
});