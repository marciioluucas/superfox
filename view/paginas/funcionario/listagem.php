<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 27/10/2016
 * Time: 17:09
 */


?>

<h5>Listar por:</h5>
<article>
    <section>
        <div class="row">
            <div class="row">
                <div class="col s12">
                    <form class="">
                        <div class="row">
                            <div class="input-field col s2">
                                <input id="id" type="text" class="validate id" autocomplete="off">
                                <label for="id">ID</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="nome" type="text" class="validate nome" autocomplete="off">
                                <label for="nome">Nome</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="cpf" type="text" class="validate cpf" autocomplete="off">
                                <label for="cpf">CPF</label>
                            </div>
                        </div>
                        <div class="row">
                            <a class="waves-effect waves-light btn btn-pesquisar"
                            >Pesquisar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="pesquisa"></div>
        </div>
    </section>
</article>
<div class="modal modal-fixed-footer" id="modalAcoes">
    <div class="dialogModal">
    </div>
</div>


<script>


    $('input').on("blur", function () {


//        nome = nome == undefined ? "" : nome;
//        login = login == undefined ? "" : login;
//        id = id == undefined ? "" : id;
//        email = email == undefined ? "" : email;
    });


    $('.btn-pesquisar').on("click", function () {
        var id = '';
        var nome = '';
        var cpf = '';
        id = $('.id').val();
        nome = $('.nome').val();
        cpf = $('.cpf').val();
        var url = encodeURI("../funcionario/lista.php?id=" + id + "&nome=" + nome + "&cpf=" + cpf);
        alert(url);
        ajaxGenerico(".pesquisa", url);
//        ajaxComCallback(url);
    });


    $(document).ready(function () {
        $('.modal').modal();
    })


</script>