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
        <h5>Cadastro de funcionário</h5>
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
                            <select id="cargo" class="cargo" name="cargo">

                            </select>
                            <label for="cargo">Cargo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input id="cpf" name="cpf" type="text">
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
    $(document).ready(function () {

        var jsonCargos = JSON.parse('<?php echo $cargoController->retornaJsonPesquisaCargo(); ?>');
        var html = '<option value="" disabled selected>Selecione uma opção</option>';
        for (var i = 0; i < jsonCargos.length; i++) {
            html += "<option value='" + jsonCargos[i].pk_cargo + "'>" + jsonCargos[i].nome + "</option>";
        }
       document.getElementById("cargo").innerHTML = html;
        $('select').material_select();
    });
</script>
<script src="../funcionario/cadastro.js"></script>