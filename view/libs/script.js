/**
 * Created by Márcio Lucas on 24/10/2016.
 */

function ajaxConteudo(url) {
    $( ".conteudo" ).load( url, function() {
        console.log('Sucesso!');
    });
}

$(document).ready(function () {
    ajaxConteudo('paginas/dashboard.php');
    $('.modal-configuracoes').leanModal();
});

function ajaxGenerico(seletor, url) {
    $(seletor).load(url, function() {
        console.log('Sucesso!');
    })
}