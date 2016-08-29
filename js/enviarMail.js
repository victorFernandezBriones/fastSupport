$(document).ready(function () {

    $("#formEnvioCorreo").validate({
        rules: {
            nombre: {
                required: true,
                espacioBlanco: true
            },
            email: {
                required: true,
                espacioBlanco: true,
                email: true
            },
            mensaje: {
                required: true,
                espacioBlanco: true
            }
        },
        messages: {
            nombre: {
                required: "Por favor, ingrese su nombre",
                espacioBlanco: "Por favor, no rellene con espacios"
            },
            email: {
                required: "Por favor, ingrese su e-mail",
                espacioBlanco: "Por favor, no rellene con espacios",
                email: "Por favor, ingrese una dirección de correo válida"
            },
            mensaje: {
                required: "Por favor, ingrese mensaje",
                espacioBlanco: "Por favor, no rellene con espacios"
            }
        },
        submitHandler: function () {
            var nombre = $.trim($("#nombre").val());
            var email = $.trim($("#email").val());
            var mensaje = $.trim($("#mensaje").val());


            $.post("envioMail.php", {"nombre": nombre, "email": email, "mensaje": mensaje}, function (r) {
               
                if (r == 1) {
                    
                    $("#formEnvioCorreo").each(function () {
                        this.reset();
                    });

                    $("#mensajeExitoEnvio").show("fast");
                }
            });
        }
    });



});

