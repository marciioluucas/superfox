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

function ajaxPost(url, parametros = {}) {
    $.post(url, parametros).done(function (data) {
        console.log(data);
        var icon;
        if (data.tipo == "erro") {
            icon = "close";
        } else if (data.tipo == "sucesso") {
            icon = "check";
        }
        Materialize.toast("<span><i class='material-icons left'>" + icon + "</i>" + data.mensagem + "</span>", 4000)
    });
}

function montaToastComIcone(mensagem,icone) {
    Materialize.toast("<span><i class='material-icons left'>" + icone + "</i>" + mensagem + "</span>", 4000)
}