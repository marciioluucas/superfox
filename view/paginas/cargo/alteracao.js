/**
 * Created by Márcio Lucas on 11/11/2016.
 */
$(".btn-fechar").on("click", function () {
    $('#modalAcoes').modal('close');
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

$('#btn-alterar').on("click", function () {
    var id = $(".identificacao").val();
    var nome = $(".nome").val();
    var descricao = $(".loginn").val();
    if (verificaSeTemValorNosCampos([".identificacao", ".nome", ".descricao"])) {
        ajaxPost("../../../controller/CargoController.php", {
            "action": "alterar",
            "id": id,
            "nome": nome,
            "descricao": descricao
        })
    }

});