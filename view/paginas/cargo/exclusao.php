<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 11/11/2016
 * Time: 15:59
 */

?>
<div class="modal-content">
    <h4>Excluir usuário</h4>
    <div class="row center-align" style="margin-top: 100px">
        <h5>Você tem certeza que quer excluir este cargo?</h5>
    </div>
    <div class="row center-align">
        <input type="text" value="<?php echo $_GET['id'] ?>" hidden="hidden" class="identificacao">
        <button class="waves-effect waves-light red btn-excluir btn"><i class="material-icons left">close</i>Sim
        </button>
        <button class="modal-action modal-close waves-effect waves-light blue btn-fechar btn"><i
                class="material-icons left">check</i>Não
        </button>
    </div>
</div>

<script>
    $(".btn-excluir").on("click", function () {
        var id = $('.identificacao').val();
        ajaxPost("../../../controller/CargoController.php",
            {"action": "excluir", "id": id});
        var url = encodeURI("../cargo/lista.php");
        alert(url);
        ajaxGenerico(".pesquisa", url);
    })
</script>


