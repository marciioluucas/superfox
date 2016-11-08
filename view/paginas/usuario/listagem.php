<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 27/10/2016
 * Time: 17:09
 */


?>
<h5>Listar por:</h5>
<article>
    <section>
        <div class="row">
            <div class="row">
                <div class="col s12">
                    <div class="card-panel grey lighten-2">
                        <form class="">
                            <div class="row">
                                <div class="input-field col s8">
                                    <input id="login" type="text" class="validate">
                                    <label for="login">Login</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="id" type="text" class="validate">
                                    <label for="id">ID</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s8">
                                    <input id="nome" type="text" class="validate">
                                    <label for="nome">Nome</label>
                                </div>
                            </div>
                            <div class="row">
                                <a class="waves-effect orange darken-3 waves-light btn btn-pesquisar"
                                >Pesquisar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
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
                require_once $_SERVER['DOCUMENT_ROOT'] . "/superfox/controller/UsuarioController.php";

                ?>
                <tr>
                    <td>Alvin</td>
                    <td>Eclair</td>
                    <td>$0.87</td>
                    <td><a class="waves - effect orange darken - 3  waves - light btn"><i
                                class="material - icons center">remove_red_eye</i></a>
                    </td>
                    <td><a class="waves - effect blue darken - 3  waves - light btn"><i
                                class="material - icons center">create</i></a></td>
                    <td><a class="waves - effect red darken - 3  waves - light btn"><i
                                class="material - icons center">delete</i></a></td>
                </tr>
                <tr>
                    <td>Alan</td>
                    <td>Jellybean</td>
                    <td>$3.76</td>
                    <td><a class="waves - effect orange darken - 3  waves - light btn"><i
                                class="material - icons center">remove_red_eye</i></a>
                    </td>
                    <td><a class="waves - effect blue darken - 3  waves - light btn"><i
                                class="material - icons center">create</i></a></td>
                    <td><a class="waves - effect red darken - 3  waves - light btn"><i
                                class="material - icons center">delete</i></a></td>
                </tr>
                <tr>
                    <td>Jonathan</td>
                    <td>Lollipop</td>
                    <td>$7.00</td>
                    <td><a class="waves - effect orange darken - 3  waves - light btn"><i
                                class="material - icons center">remove_red_eye</i></a>
                    </td>
                    <td><a class="waves - effect blue darken - 3  waves - light btn"><i
                                class="material - icons center">create</i></a></td>
                    <td><a class="waves - effect red darken - 3  waves - light btn"><i
                                class="material - icons center">delete</i></a></td>
                </tr>


                </tbody>
            </table>
        </div>
    </section>
</article>

<script>
    var nome = '';
    var login = '';
    var id = '';

    $('input').on("keyup", function () {
        nome = $('#nome').val();
        login = $('#login').val();
        id = $('#id').val();
    });

    var objetoPesquisa;
    $('.btn-pesquisar').on("click", function () {
//        ajaxComCallback();
        var url = encodeURI("../controller/UsuarioController.php?action=pesquisar&id=" + id + "&nome=" + nome + "&login=" + login);
//        alert(url);
//        ajaxGenerico('.tabela-pesquisa', url);
        ajaxComCallback(url);
        alert(objetoPesquisa);
    });


    function ajaxComCallback(url) {
        $.ajax({
            url: url,
            type: "post",
            datatype: 'json',
            success: function (data) {
                objetoPesquisa = data;
            },
            error: function () {
                console.log("Erro na requisição AJAX");
            }
        });
    }


</script>