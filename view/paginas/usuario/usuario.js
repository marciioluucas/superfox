/**
 * Created by Márcio Lucas on 11/11/2016.
 */


$('ul.autocomplete-content').on("click", function () {
    $('input.autocomplete').attr("disabled", "true");
    $('.input-normal').removeAttr("disabled");
});

$('.escolher-outro').on("click", function () {
    $('input.autocomplete').removeAttr("disabled").val("");
    $('.input-normal').attr("disabled", "true");

});

$(document).ready(function () {
    $('.input-normal').attr("disabled", "true");
});

$('#enviar').on("click", function () {
    var funcionario = $("#funcionario").val();
    var email = $("#email").val();
    var login = $("#loginn").val();
    var senha = $("#senha").val();

    ajaxPost("../../../controller/UsuarioController.php", {
        "action": "salvar",
        "funcionario": funcionario,
        "email": email,
        "login": login,
        "senha": senha
    });
});
$("#limpar-campos").on("click", function () {
    $('input').val("");
    $('.input-normal').attr("disabled", "true");
    $('input.autocomplete').removeAttr("disabled").val("");
});
