<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 09/11/2016
 * Time: 14:28
 */

require_once $_SERVER['DOCUMENT_ROOT'] . "/superfox/controller/CargoController.php";

?>
<table class="responsive-table">
    <thead>
    <tr>
        <th data-field="id">ID</th>
        <th data-field="name">Nome</th>
        <th data-field="ver" width="18">Ver</th>
        <th data-field="editar" width="18">Editar</th>
        <th data-field="excluir" width="18">Excluir</th>
    </tr>
    </thead>

    <tbody class="tabela-pesquisa">
    <?php
    $cargoController = new CargoController();
    $arrayDados = $cargoController->pesquisarCargo();
    //    print_r($arrayDados);
    for ($i = 0; $i < count($arrayDados); $i++) {

        ?>
        <tr>
            <td><?php echo $arrayDados[$i]['pk_cargo']; ?></td>
            <td><?php echo $arrayDados[$i]['nome']; ?></td>
            <td>
                <button class="waves-effect waves-light btn" data-target="modalAcoes"
                        onclick="ajaxGenerico('.dialogModal',
                            encodeURI('../cargo/ver.php?<?php echo "id=" . $arrayDados[$i]['pk_cargo'] .
                            "&nome=" . $arrayDados[$i]['nome'] . "&descricao=" . $arrayDados[$i]['descricao']; ?>'))">
                    <i
                        class="material-icons center">remove_red_eye</i></button>
            </td>
            <td>
                <button class="waves-effect blue darken-3  waves-light btn" data-target="modalAcoes"
                        onclick="ajaxGenerico('.dialogModal', encodeURI('../cargo/alteracao.php?<?php echo "id=" . $arrayDados[$i]['pk_cargo']; ?>'))">
                    <i
                        class="material-icons center">create</i></button>
            </td>
            <td><a class="waves-effect red darken-3  waves-light btn" data-target="modalAcoes"
                   onclick="ajaxGenerico('.dialogModal', encodeURI('../cargo/exclusao.php?<?php echo "id=" . $arrayDados[$i]['pk_cargo']; ?>'))">
                    <i
                        class="material-icons center">delete</i></a></td>
        </tr>
    <?php } ?>


    </tbody>
</table>
<ul class="pagination center">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <li class="active"><a href="#">1</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
</ul>
