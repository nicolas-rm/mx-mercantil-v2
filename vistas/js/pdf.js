// $("#GenerarPDF").click(function() {
//     var pdf = new jsPDF();
//     pdf.text(20, 20, "Mostrando una Tabla con JsPDF");

//     var columns = ["Id", "Nombre", "Email", "Pais"];
//     var data = [
//         [1, "Carlos", "009@gmail.com", "Mexico"],
//         [2, "Miguel", "888@hotmail.com", "Brasil"],
//         [3, "Jorge", "jorge@yandex.com", "Ecuador"],
//         [4, "mario", "mario@yandex.com", "Colombia"],
//     ];


//     pdf.autoTable(columns, data, { margin: { top: 25 } });
//     pdf.save('MiTabla.pdf');

// });
// // $("#pdf").click(function pdf(tabladb) {

// //     console.log("HOLa mundo");
// // });

$(function() {
    // console.log("ENTRO A DENTRO DE LA FUNCION");
    $('body').on('click', '#GenerarMysql', function(e) {
        // var conductores;
        console.log("HOLA");

        // var editConductor = $(this).attr("value");
        console.log("PDFJS ", "PDFJS");
        var datos = new FormData(); //guardo los datos
        datos.append('PDFJS', "PDFJS"); //le asigno el id a la variable datos
        var b = this;
        $.ajax({

            url: "ajax/pdf.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                console.log("SI ENTRO");
                console.log(respuesta);


                // function pdfGenerate(params) {
                var pdf = new jsPDF();
                pdf.text(20, 20, "Mostrando una Tabla con JsPDF");


                var columns = ["ID", "NOMBRE", "APELLIDOS", "NUMERO LICENCIA", "ANTIGUEDAD", "ESTATUS"];
                var data = [];

                for (let index = 0; index < respuesta.length; index++) {
                    // const element = array[index];
                    // data[index].Id = index;
                    // data[0] = respuesta[index].ID_CONDUCTORES;
                    // data[1] = respuesta[index].NOMBRE;
                    // data[2] = respuesta[index].APELLIDOS;
                    // data[3] = respuesta[index].FECHA_NACIMIENTO;
                    // data[4] = respuesta[index].CURP;
                    // data[5] = respuesta[index].DIRECCION;
                    // data[6] = respuesta[index].NUMERO_LICENCIA;
                    // data[7] = respuesta[index].ANTIGUEDAD;
                    // data[8] = respuesta[index].ID_ESTATUS_CONDUCTORES;
                    data[index] = respuesta[index];
                    // data[index][0] = (index + 1);
                };
                console.log("valores de data: ");
                console.log(data);

                for (let index = 0; index < respuesta.length; index++) {
                    // data[index][0] = respuesta[index].ID_CONDUCTORES;
                    data[index][0] = (index + 1);
                    data[index][1] = respuesta[index].NOMBRE;
                    data[index][2] = respuesta[index].APELLIDOS;
                    data[index][3] = respuesta[index].NUMERO_LICENCIA;
                    data[index][4] = respuesta[index].ANTIGUEDAD;
                    data[index][5] = respuesta[index].ID_ESTATUS_CONDUCTORES;

                }
                // var data = [
                //     [1, "Carlos", "009@gmail.com", "Mexico"],
                //     [2, "Miguel", "888@hotmail.com", "Brasil"],
                //     [3, "Jorge", "jorge@yandex.com", "Ecuador"],
                //     [4, "mario", "mario@yandex.com", "Colombia"],
                // ];
                // }

                console.log(data);

                pdf.autoTable(columns, data, { margin: { top: 25 } });
                pdf.save('MiTabla.pdf');
                // b.conductores = respuesta;

                // console.log("B", b);
            }
        });

        // console.log(conductores);
    });
});