<!-- * Created by PhpStorm.-->
<!-- * User: Márcio Lucas-->
<!-- * E-mail: marciioluucas@gmail.com-->
<!-- * Date: 21/10/2016-->
<!-- * Time: 16:46-->

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Superfox - Login</title>
</head>
<body class="white-text grey darken-3">
<div class="row" style="margin: 0">
    <div class="col offset-l4 offset-m3"></div>
    <div class="col l4 m10 s12" style="margin-bottom: 50px">
        <div class="row center-align" style="margin: 0 !important;">
            <img src="../dist/imgs/logo-superfox-login.png" alt="logo superfox" class="responsive-img" style="">
        </div>
        <div class="card white darken-1" style="margin-bottom: 0">
            <form action="../../controller/UsuarioController.php" method="post">
                <input type="text" hidden="hidden" value="logar" name="action">
                <div class="card-content grey-text">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" name="email" type="email" class="validate" autocomplete="no">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="senha" type="password" name="senha" class="validate">
                                <label for="senha">Senha</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="checkbox" class="filled-in" id="lembrar-de-mim"/>
                                <label for="lembrar-de-mim">Lembrar de mim</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-action">
                    <input type="submit" class="waves-effect waves-light btn ">
                </div>
            </form>
        </div>
    </div>
    <div class="col offset-l4 offset-m3"></div>
</div>
<footer class="page-footer" style="bottom: 0; position: fixed; width: 100%; z-index: 9999; margin-top: 15px">
    <div class="footer-copyright">
        <div class="container">
            © 2016 - Superfox - Todos os direitos reservados.
            <a class="grey-text text-lighten-4 right" href="http://github.com/marciioluucas/superfox">Project on
                github</a>
        </div>
    </div>
</footer>
<link rel='stylesheet' href='../libs/materializecss/css/materialize.css'/>
<link rel='stylesheet' href='../libs/morris-charts/morris.min.css'/>
<link href="../libs/materializecss/css/material-icons.css" rel="stylesheet">
<script src='../libs/jquery/jquery-3.1.1.min.js'></script>
<script src='../libs/materializecss/js/materialize.min.js'></script>
<script src='../libs/trianglify/trianglify.min.js'></script>
<script src="../libs/morris-charts/morris.min.js"></script>
<script src="../libs/morris-charts/raphael.min.js"></script>
<script src='../libs/script.js'></script>

<script>
    function queryObj() {
        var result = {}, keyValuePairs = location.search.slice(1).split("&");
        console.log(keyValuePairs);
        keyValuePairs.forEach(function (keyValuePair) {
            keyValuePair = keyValuePair.split('=');
            result[decodeURIComponent(keyValuePair[0])] = decodeURIComponent(keyValuePair[1]) || '';
        });
        return result;
    }
    var json = queryObj();
    for (var i = 0; i < json.mensagem.length; i++) {
        json.mensagem = json.mensagem.replace("+", " ");
    }


    Materialize.toast(json.mensagem, 4000);
</script>
</body>
</html>