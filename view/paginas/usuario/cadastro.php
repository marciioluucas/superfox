<?php
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 19:48
 */
?>

<article>
    <section>
        <h5>Cadastro de usuário</h5>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s10 m4 l4">
                        <input type="text" id="funcionario">
                        <label for="funcionario">Funcionário</label>
                    </div>
                    <div class="col s2 m2 l2 valign-wrapper" style="padding-top: 22px;">
                        <a class="waves-effect orange darken-3 waves-light btn">Checar!</a>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <input id="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <input id="senha" type="password" class="validate">
                        <label for="senha">Senha</label>
                    </div>
                </div>
            </form>
        </div>
    </section>
</article>
<script>
    $('input.autocomplete').autocomplete({
        data: {
            "1": null,
            "Microsoft": null,
            "Google": null
        }
    });
</script>