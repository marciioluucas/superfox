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
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12 m4 l4">
                        <input type="text" id="funcionario" class="autocomplete" autocomplete="off">
                        <label for="funcionario">Funcionário</label>
                    </div>

                    <div class="col s12 m2 l2 valign-wrapper" style="padding-top: 22px;">
                        <a class="waves-effect waves-light btn escolher-outro"><i class="material-icons left">repeat</i>escolher
                            outro</a>
                    </div>
                </div>
                <div class="row">
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
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <input id="senha" type="text" class="validate input-normal">
                        <label for="senha">Login</label>
                    </div>
                </div>
            </form>
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
    })
</script>