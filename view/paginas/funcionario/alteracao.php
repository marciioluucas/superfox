<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 08/11/2016
 * Time: 14:42
 */
$id = $_GET['id'];
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/controller/FuncionarioController.php");
$funcionarioController = new FuncionarioController();
$funcionario = $funcionarioController->porId($id);
?>

<!-- Modal Structure -->
<div class="modal-content">
    <h4>Alterar usuário</h4>
    <div class="row">
        <div class="row">
            <input type="text" value="<?php echo $_GET['id'] ?>" id="identificacao" name="id" hidden="hidden">
            <div class="input-field col s12 m6 l6">
                <input value="<?php echo $funcionario['nome']; ?>" id="nome" name="nome" type="text"
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
                <input value="<?php echo $funcionario['senha'] ?>" id="senha" name="senha" type="password"
                       class="validate">
                <label class="active" for="senha">Senha</label>
            </div>
        </div>
        <div class="row">
            <button class="btn waves-effect waves-light" id="btn-alterar">alterar</button>
            <button class="btn waves-effect waves-light red btn-fechar">cancelar</button>

        </div>
    </div>

</div>
<div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat btn-fechar">Fechar</a>
</div>
<script src="../funcionario/alteracao.js"></script>
