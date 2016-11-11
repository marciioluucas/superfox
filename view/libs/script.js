/**
 * Created by Márcio Lucas on 24/10/2016.
 */

function ajaxConteudo(url) {
    $(".conteudo").load(url, function () {
        console.log('Sucesso!');
    });
}

$(document).ready(function () {
    ajaxConteudo('../dashboard.php');
    $('.modal-configuracoes').modal();
});

function ajaxGenerico(seletor, url) {
    $(seletor).load(url, function () {
        console.log('Sucesso!');
    })
}

var objetoPesquisa;
function ajaxComCallback(url, tipoRequisicao) {
    $.ajax({
        url: encodeURI(url),
        type: tipoRequisicao,
        datatype: 'json',
        success: function (data) {
            objetoPesquisa = data;
        },
        error: function () {
            console.log("Erro na requisição AJAX");
        }
    });
}

function ajaxPost(formulario, JSONInfos) {

}
