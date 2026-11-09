$(document).ready(function(){

    $("#entrar").click(function() {
        if ($("input#Email1").val() == "" || $("input#senha1").val() === "") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Por favor, preencha todos os campos!"
            });
            return
        }

        var letras = $("#senha1").val().length;
        console.log(letras);
        if (letras < 8) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "A senha deve ter no mínimo 8 caracteres!"
            });
            return;
        }

        $ajax({
            url: 'api/login',
            method: 'POST',
            data: {
                email: $("input#Email1").val(),
                senha: $("input#senha1").val()
            },
            success: function(response) {
                if (response.erro == 'n') {
                    alert(response.token);
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.message
                    });
                }
            }
        });

    });



        



});