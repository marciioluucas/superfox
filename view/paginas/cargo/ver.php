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
$descricao = $_GET['descricao'];
?>

<!-- Modal Structure -->
<div class="modal-content">
    <h4>Ver usuário</h4>
    <div class="row">
        <form action="">
            <div class="row">

                <div class="input-field inline col s6">
                    <input disabled value="<?php echo $nome ?>" id="nome" type="text">
                    <label for="nome" class="active">Nome</label>
                </div>
                <div class="input-field inline col s6">
                    <textarea disabled id="descricao" type="text" class="materialize-textarea"> <?php echo $descricao ?> </textarea>
                    <label for="descricao" class="active">Descrição</label>
                </div>
            </div>

        </form>
    </div>

</div>
<div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat"
       onclick="$('#modalAcoes').modal('close');">Fechar</a>
</div>

