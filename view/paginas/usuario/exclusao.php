<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 11/11/2016
 * Time: 15:59
 */

$id = $_GET['id'];
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/controller/UsuarioController.php");
$usuarioController = new UsuarioController();
$usuario = $usuarioController->porId($id);
?>
<div class="modal-content">
    <h4>Excluir usuário</h4>
    <div class="row">
        <h5>Você tem certeza que quer excluir este usuário?</h5>
    </div>
    <div class="row center-align">
        <button href="#!" class="waves-effect waves-light red btn-excluir btn"><i class="material-icons left">close</i>Sim</button>
        <button href="#!" class="modal-action modal-close waves-effect waves-light blue btn-fechar btn"><i class="material-icons left">check</i>Não</button>
    </div>

</div>


