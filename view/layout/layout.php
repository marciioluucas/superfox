<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 24/10/2016
 * Time: 16:41
 */
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Título da Página (Estrutura básica de uma página com HTML 5)</title>
</head>
<body class="grey accent-4">
<ul id="slide-out" class="side-nav fixed">
    <li>
        <div class="userView">
            <img class="background" src="../dist/imgs/default-user-background.jpg">
            <a href="#!user"><img class="circle" src="../dist/imgs/default-user-img-fox.jpg"></a>
            <a href="#!name"><span class="white-text name">Márcio Lucas</span></a>
            <a href="#!email"><span class="white-text email">marciioluucas@gmail.com</span></a>
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

<?php
include_once 'libs-layout.php';
?>

<script>

    $(".button-collapse").sideNav();
</script>
</body>
</html>
