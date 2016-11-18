<?php
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 19:48
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/controller/FuncionarioController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/controller/CargoController.php");
$funcionarioController = new FuncionarioController();
$cargoController = new CargoController();
?>

<article>
    <section>
        <h5>Cadastro de usuário</h5>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="row">

                        <div class="input-field col s12 m6 l6">
                            <input id="nome" name="nome" type="text"
                                   class="validate nome"
                                   autocomplete="false">
                            <label class="active" for="nome">Nome</label>
                        </div>

                        <div class="input-field col s12 m6 l6">
                            <select id="cargo" class="cargo">
                                <option value="" disabled selected>Selecione uma opção</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label for="cargo">Cargo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input id="cpf" name="CPF" type="text">
                            <label for="cpf">CPF</label>
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
    $(document).ready(function () {
        $('select').material_select();
        var jsonCargos = <?php $cargoController->retornaJsonPesquisaCargo(); ?>;
        var html;
        for (var i = 0; i < jsonCargos.length; i++) {
            html += "<option value='" + jsonCargos[i].pk_cargo + "'>" + jsonCargos[i].nome + "</option>";
        }
        $('#cargo').innerHTML = html;
    });
</script>
<script src="../funcionario/cadastro.js"></script>