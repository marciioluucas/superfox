<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 08/11/2016
 * Time: 14:42
 */
$id = $_GET['id'];
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/controller/CargoController.php");
$cargoController = new CargoController();
$cargo = $cargoController->porId($id);
?>

<!-- Modal Structure -->
<div class="modal-content">
    <h4>Alterar cargo</h4>
    <div class="row">
        <div class="row">
            <input type="text" value="<?php echo $_GET['id'] ?>" class="identificacao" name="id" hidden="hidden">
            <div class="input-field col s12 m6 l6">
                <input value="<?php echo $cargo['nome']; ?>" id="nome" class="nome validate" name="nome" type="text"
                       autocomplete="false">
                <label class="active" for="nome">Nome</label>
            </div>

            <div class="input-field col s12 m6 l6">
                <textarea id="descricao" name="descricao" type="text"
                          class="validate descricao materialize-textarea"><?php echo $cargo['descricao'] ?>
                </textarea>
                <label class="active" for="descricao">Descrição</label>
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
<script src="../cargo/alteracao.js"></script>
