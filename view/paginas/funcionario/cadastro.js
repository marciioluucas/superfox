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
    var nome = $(".nome").val();
    var cargo = $(".cargo").val();
    var cpf = $(".cpf").val();

    if (verificaSeTemValorNosCampos([".nome", ".cargo", ".cpf"])) {
        ajaxPost("../../../controller/FuncionarioController.php", {
            "action": "salvar",
            "nome": nome,
            "cargo": cargo,
            "cpf": cpf
        })
    }
});
$("#limpar-campos").on("click", function () {
    $('input').val("");
    $('.input-normal').attr("disabled", "true");
    $('input.autocomplete').removeAttr("disabled").val("");
});

function verificaSeTemValorNosCampos(seletoresCampos = []) {
    var nomeDoCampo = [];
    var retorno = true;
    for (var i = 0; i < seletoresCampos.length; i++) {
        nomeDoCampo[i] = $(seletoresCampos[i]).attr("name");
        if ($(seletoresCampos[i]).val() == undefined || $(seletoresCampos[i]).val() == "") {
            montaToastComIcone("O campo " + nomeDoCampo[i] + " não pode ser vazio", "close");
            retorno = false;
        }
    }
    return retorno;
}