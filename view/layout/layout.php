<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 24/10/2016
 * Time: 16:41
 */
require_once '../../controller/UsuarioController.php';
require_once '../../model/Funcionario.php';
$usuarioController = new UsuarioController();
//$usuarioController->protecaoLoggin();


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

        @media only screen and (max-width: 992px) {
            header, main, footer {
                padding-left: 0;
            }
        }

    </style>
</head>
<body class="grey accent-4">
<ul id="slide-out" class="side-nav fixed">
    <li>
        <div class="userView">
            <img class="background" src="../dist/imgs/default-user-background.jpg">
            <a href="#!user"><img class="circle" src="../dist/imgs/default-user-img-fox.jpg"></a>
            <a href="#!name"><span class="white-text name"><?php $usuarioController->infoUsuarioLogado('nome') ?></span></a>
            <a href="#!email"><span class="white-text email"><?php $usuarioController->infoUsuarioLogado('email') ?></span></a>
        </div>
    </li>
    <li><a href="#!" class="waves-effect"><i class="material-icons">dashboard</i>Dashboard</a></li>
    <li><a href="#!" class="waves-effect"><i class="material-icons">shopping cart</i>Produtos</a></li>
    <li><a href="#!" class="waves-effect"><i class="material-icons">people</i>Usuários</a></li>
    <li><a href="#!" class="waves-effect"><i class="material-icons">credit_card</i> Financeiro</a></li>
    <li><a href="#!" class="waves-effect"><i class="material-icons">person outline</i>Funcionários</a></li>
    <li>
        <div class="divider"></div>
    </li>
    <li><a class="waves-effect" href="#"><i class="material-icons">settings</i>Configurações</a></li>
    <li><a class="waves-effect" href="#!"><i class="material-icons">exit_to_app</i>Sair</a></li>
</ul>
<nav>
    <div class="nav-wrapper grey darken-3">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#"><i class="material-icons">exit_to_app</i></a></li>
        </ul>
    </div>
</nav>
<main>
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card white darken-1">
                <div class="card-content grey-text darken-3">
                    <span class="card-title">Dashboard</span>
                    <p><?php echo $usuarioController->infoUsuarioLogado('nome') ?></p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include_once 'libs-layout.php';
?>

<script>
    $(".button-collapse").sideNav();
</script>
</body>
</html>
