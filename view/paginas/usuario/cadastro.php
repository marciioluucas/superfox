<?php
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 19:48
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/controller/UsuarioController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/controller/FuncionarioController.php");
$usuarioController = new UsuarioController();
$funcionarioController = new FuncionarioController();
$jsonFuncionarios = $funcionarioController->pesquisarFuncionarioCPF();
?>

<article>
    <section>
        <h5>Cadastro de usuário</h5>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s9 m4 l4">
                        <input type="text" id="funcionario" class="autocomplete" autocomplete="off">
                        <label for="funcionario">Funcionário</label>
                    </div>

                    <div class="col s3 m2 l2 valign-wrapper" style="padding-top: 22px;">
                        <a class="waves-effect waves-light btn escolher-outro"><i
                                class="material-icons center">repeat</i></a>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input id="email" type="email" class="validate input-normal">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <input id="senha" type="password" class="validate input-normal">
                        <label for="senha">Senha</label>
                    </div>

                    <div class="input-field col s12 m6 l6">
                        <input id="senha" type="text" class="validate input-normal">
                        <label for="senha">Login</label>
                    </div>
                </div>
                <div class="row">
                    <button class="waves-effect waves-light btn waves-light" id="enviar">Enviar</button>
                    <button class="waves-effect waves-light btn red waves-light" id="limpar-campos">Limpar campos
                    </button>
                </div>
            </div>
        </div>
    </section>
</article>
<script>
    $('input.autocomplete').autocomplete({
        data: {
            <?php echo "" . $funcionarioController->montaJSONParaConsultaFuncionarioCPF() . ""; ?>
        }
    });

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
        var login = $("#login").val();
        var senha = $("#senha").val();

        $.post("../../../controller/UsuarioController.php", {
            "action": "salvar",
            "funcionario": funcionario,
            "email": email,
            "login": login,
            "senha": senha
        }).done(function (data) {
            alert(data);
            console.log("SUCESSO!");
            Materialize.toast(data.mensagem, 4000)
        });
    });

    $("#limpar-campos").on("click", function () {
        $('input').val("");
        $('.input-normal').attr("disabled", "true");
        $('input.autocomplete').removeAttr("disabled").val("");
    });


</script>