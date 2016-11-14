/**
 * Created by Márcio Lucas on 11/11/2016.
 */



$('#enviar').on("click", function () {
    let nome = $(".nome").val();
    let descricao = $("#descricao").val();

    if (verificaSeTemValorNosCampos([".nome", "#descricao"])) {
        ajaxPost("../../../controller/CargoController.php", {
            "action": "salvar",
            "nome": nome,
            "descricao": descricao
        })
    }
});
$("#limpar-campos").on("click", function () {
    $('input').val("");
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