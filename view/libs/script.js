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
$("#searchForm").submit(function (event) {

    // Stop form from submitting normally
    event.preventDefault();

    // Get some values from elements on the page:
    var $form = $(this),
        url = $form.attr("action");

    // Send the data using post
    var posting = $.post(url, {s: term});

    // Put the results in a div
    posting.done(function (data) {
        var content = $(data).find("#content");
        $("#result").empty().append(content);
    });
});