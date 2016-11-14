<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 24/10/2016
 * Time: 16:41
 */
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/controller/UsuarioController.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/superfox/model/Funcionario.php");
$usuarioController = new UsuarioController();
$usuarioController->protecaoLoggin();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Dashboard - Superfox</title>
    <style>
        header, main, footer {
            padding-left: 300px;
        }


        .principal {

        }

        @media only screen and (max-width: 992px) {
            header, main, footer {
                padding-left: 0;
            }
        }

    </style>
</head>
<body class="grey lighten-1">
<aside>
    <nav>
        <ul id="slide-out" class="side-nav fixed">
            <li>
                <div class="userView" style="height: 220px">
                    <img class="background" src="../../dist/imgs/default-user-background.jpg" >
                    <a href="#user"><img class="circle" src="../../dist/imgs/default-user-img-fox.jpg"></a>
                    <a href="#name"><span
                            class="white-text name">
                            <?php $usuarioController->infoUsuarioLogado('nome') ?>
                        </span></a>
                    <a href="#email"><span
                            class="white-text email">
                            <?php $usuarioController->infoUsuarioLogado('email') ?>
                        </span></a>
                </div>
            </li>
            <li><a href="#dashboard" class="waves-effect" onclick="ajaxConteudo('../dashboard.php')"><i
                        class="material-icons">dashboard</i>Dashboard</a></li>

            <li>
                <a href="#produtos" class="waves-effect"
                   onclick="ajaxConteudo('../produto/index.php')"><i
                        class="material-icons">shopping cart</i>Produtos</a>
            </li>

            <li><a href="#usuarios" class="waves-effect" onclick="ajaxConteudo('../usuario/index.php')"><i
                        class="material-icons">people</i>Usuários</a></li>

            <li><a href="#financeiro" class="waves-effect" onclick="ajaxConteudo('../financeiro/index.php')"><i
                        class="material-icons">credit_card</i>
                    Financeiro</a></li>

            <li><a href="#funcionarios" class="waves-effect" onclick="ajaxConteudo('../funcionario/index.php')"><i
                        class="material-icons">person</i>Funcionários</a></li>
            <li><a href="#funcionarios" class="waves-effect" onclick="ajaxConteudo('../cargo/index.php')"><i
                        class="material-icons">work</i>Cargos</a></li>

            <li>
                <div class="divider"></div>
            </li>
            <li><a class="waves-effect modal-configuracoes" href="#configuracoes"
                   onclick="ajaxGenerico('#configuracoes', '../configuracoes.php')"><i
                        class="material-icons">settings</i>Configurações</a></li>

            <li><a class="waves-effect" href="../../../controller/UsuarioController.php?action=sair"><i class="material-icons">exit_to_app</i>Sair</a></li>
        </ul>

        <div class="nav-wrapper grey darken-3">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            <a href="#" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../../../controller/UsuarioController.php?action=sair"><i
                            class="material-icons">exit_to_app</i></a></li>
            </ul>
        </div>
    </nav>
</aside>

<main class="fixed">
    <article class="row ">
        <section class="col s12 m12 l12 ">
            <div class="card white darken-1">
                <div class="card-content grey-text darken-3 principal">
                    <div class="conteudo" style="height: 100%">
                    </div>
                </div>
            </div>
        </section>
    </article>
</main>

<aside id="configuracoes" class="modal bottom-sheet">

</aside>
<link rel='stylesheet' href='../../libs/materializecss/css/materialize.css'/>
<link rel='stylesheet' href='../../libs/morris-charts/morris.min.css'/>
<link href="../../libs/materializecss/css/material-icons.css" rel="stylesheet">
<script src='../../libs/jquery/jquery-3.1.1.min.js'></script>
<script src='../../libs/materializecss/js/materialize.min.js'></script>
<script src='../../libs/trianglify/trianglify.min.js'></script>
<script src="../../libs/morris-charts/morris.min.js"></script>
<script src="../../libs/morris-charts/raphael.min.js"></script>
<script src='../../libs/script.js'></script>
<?php
//include_once 'libs-layout.php';
?>

<script>
    $(".button-collapse").sideNav();
    $('.modal').modal();
</script>
</body>
</html>

