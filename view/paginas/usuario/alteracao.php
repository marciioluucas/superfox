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
$usuarioController =  new UsuarioController();
 $usuario = $usuarioController->porId($id);
?>

<!-- Modal Structure -->
<div class="modal-content">
    <h4>Alterar usuário</h4>
    <div class="row">
        <form action="">

            <div class="row">

                <div class="input-field inline col s12">
                    <input  value="<?php echo $usuario['login']; ?>" id="login" type="text" class="validate" autocomplete="false">
                                            <label class="active" for="login">Login</label>
                </div>
            </div>
            <div class="row">

                <div class="input-field inline col s12">
                    <input  value="<?php echo $usuario['email'] ?>" id="email" type="email" class="validate">
                                            <label class="active" for="email">Email</label>
                </div>
            </div>
        </form>
    </div>

</div>
<div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat"
       onclick="$('#modalAcoes').modal('close');">Fechar</a>
</div>

