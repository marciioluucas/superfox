<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 08/11/2016
 * Time: 14:42
 */
$id = $_GET['id'];
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/controller/UsuarioController.php");
$usuarioController = new UsuarioController();
$usuario = $usuarioController->porId($id);
?>

<!-- Modal Structure -->
<div class="modal-content">
    <h4>Alterar usuário</h4>
    <div class="row">
        <div class="row">
            <input type="text" value="<?php echo $_GET['id'] ?>" id="identificacao" name="id" hidden="hidden">
            <div class="input-field col s12 m6 l6">
                <input value="<?php echo $usuario['login']; ?>" id="loginn" name="login" type="text" class="validate"
                       autocomplete="false">
                <label class="active" for="login">Login</label>
            </div>

            <div class="input-field col s12 m6 l6">
                <input value="<?php echo $usuario['email'] ?>" id="email" name="e-mail" type="email" class="validate">
                <label class="active" for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 l6">
                <input value="<?php echo $usuario['senha'] ?>" id="senha" name="senha" type="password" class="validate">
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
<script src="../usuario/alteracao.js"></script>
