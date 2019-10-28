$(function () {
    // console.log("ENTRO A DENTRO DE LA FUNCION");
    $('body').on('click', 'button.editConductor', function (e) {
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
            success: function (respuesta) {
                console.log(respuesta);
            }
        });

    });
});
