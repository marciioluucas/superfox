<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 08/11/2016
 * Time: 14:42
 */
$id = $_GET['id'];
$nome = $_GET['nome'];
$cargo = $_GET['cargo'];
$login = $_GET['login'];
$email = $_GET['email'];
?>

<!-- Modal Structure -->
<div class="modal-content">
    <h4>Ver usuário</h4>
    <div class="row">
        <form action="">
            <div class="row">

                <div class="input-field inline col s6">
                    Nome:
                    <input disabled value="<?php echo $nome ?>" id="nome" type="text" class="validate">
                    <!--                        <label for="nome">Nome</label>-->
                </div>
                <div class="input-field inline col s6">
                    Cargo:
                    <input disabled value="<?php echo $cargo ?>" id="cargo" type="text" class="validate">
                    <!--                        <label for="cargo">Cargo</label>-->
                </div>
            </div>
            <div class="row">

                <div class="input-field inline col s12">
                    Login:
                    <input disabled value="<?php echo $login; ?>" id="login" type="text" class="validate">
                    <!--                        <label for="login">Login</label>-->
                </div>
            </div>
            <div class="row">

                <div class="input-field inline col s12">
                    E-mail:
                    <input disabled value="<?php echo $email ?>" id="email" type="email" class="validate">
                    <!--                        <label for="email">Email</label>-->
                </div>
            </div>
        </form>
    </div>

</div>
<div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat"
       onclick="$('#modalAcoes').modal('close');">Fechar</a>
</div>

