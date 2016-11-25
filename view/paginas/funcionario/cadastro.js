/**
 * Created by Márcio Lucas on 11/11/2016.
 */

$('#enviar').on("click", function () {
    var nome = $("input[name='nome']").val();
    var cargo = $("select[name='cargo']").val();
    var cpf = $("input[name='cpf']").val();


    if (verificaSeTemValorNosCampos(["input[name='nome']", "select[name='cargo']", "input[name='cpf']"])) {
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