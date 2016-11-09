<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 09/11/2016
 * Time: 14:28
 */

require_once $_SERVER['DOCUMENT_ROOT'] . "/superfox/controller/UsuarioController.php";
$id = isset($_GET['id']) ? $_GET['id'] : "";
$nome = isset($_GET['nome']) ? $_GET['id'] : "";
$email = isset($_GET['email']) ? $_GET['id'] : "";
$login = isset($_GET['login']) ? $_GET['id'] : "";
?>
<table class="responsive-table">
    <thead>
    <tr>
        <th data-field="id">Nome</th>
        <th data-field="name">Login</th>
        <th data-field="email">Email</th>
        <th data-field="ver" width="18">Ver</th>
        <th data-field="editar" width="18">Editar</th>
        <th data-field="excluir" width="18">Excluir</th>
    </tr>
    </thead>

    <tbody class="tabela-pesquisa">
    <?php
    $usuarioController = new Usuariocontroller();
    $arrayDados = $usuarioController->pesquisarUsuario();
    for ($i = 0; $i < count($arrayDados); $i++) {

        ?>
        <tr>
            <td><?php echo $arrayDados[$i]['nome']; ?></td>
            <td><?php echo $arrayDados[$i]['email']; ?></td>
            <td><?php echo $arrayDados[$i]['login']; ?></td>
            <td>
                <button class="waves-effect orange darken-3  waves-light btn" data-target="modalAcoes"
                        onclick="ajaxGenerico('.dialogModal', encodeURI('../usuario/ver.php?<?php echo "id=".$arrayDados[$i]['nome']."&nome=".$arrayDados[$i]['nome']."&cargo=Gerente&login=".$arrayDados[$i]['login']."&email=".$arrayDados[$i]['email']; ?>'))">
                    <i
                        class="material-icons center">remove_red_eye</i></button>
            </td>
            <td>
                <button class="waves-effect blue darken-3  waves-light btn" data-target="modalAcoes"
                        onclick="ajaxGenerico('.dialogModal', encodeURI('../usuario/alteracao.php?<?php echo "id=1&nome=Marcio Lucas&cargo=Gerente&login=marciioluucas&email=marciioluucas@gmail.com"; ?>//'))">
                    <i
                        class="material-icons center">create</i></button>
            </td>
            <td><a class="waves-effect red darken-3  waves-light btn"><i
                        class="material-icons center">delete</i></a></td>
        </tr>
    <?php } ?>
<!--    <tr>-->
<!--        <td>Alan</td>-->
<!--        <td>Jellybean</td>-->
<!--        <td>$3.76</td>-->
<!--        <td><a class="waves-effect orange darken-3  waves-light btn"><i-->
<!--                    class="material-icons center">remove_red_eye</i></a>-->
<!--        </td>-->
<!--        <td><a class="waves-effect blue darken-3  waves-light btn"><i-->
<!--                    class="material-icons center">create</i></a></td>-->
<!--        <td><a class="waves-effect red darken-3  waves-light btn"><i-->
<!--                    class="material-icons center">delete</i></a></td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td>Jonathan</td>-->
<!--        <td>Lollipop</td>-->
<!--        <td>$7.00</td>-->
<!--        <td><a class="waves-effect orange darken-3  waves-light btn"><i-->
<!--                    class="material-icons center">remove_red_eye</i></a>-->
<!--        </td>-->
<!--        <td><a class="waves-effect blue darken-3  waves-light btn"><i-->
<!--                    class="material-icons center">create</i></a></td>-->
<!--        <td><a class="waves-effect red darken-3  waves-light btn"><i-->
<!--                    class="material-icons center">delete</i></a></td>-->
<!--    </tr>-->


    </tbody>
</table>
