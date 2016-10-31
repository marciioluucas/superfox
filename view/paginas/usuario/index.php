<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 27/10/2016
 * Time: 17:07
 */
?>

<span class="card-title">Usuários</span>
<article>
    <section>
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#listagem">Listagem</a></li>
                    <li class="tab col s3"><a href="#cadastros">Cadastros</a></li>
                </ul>
            </div>
            <div id="listagem" class="col s12"></div>
            <div id="cadastros" class="col s12"></div>

        </div>
    </section>
</article>
<script>
    $(document).ready(function(){
        $('ul.tabs').tabs();
        $("a[href='#listagem]'").on("click", function() {
            ajaxGenerico('#listagem', 'paginas/usuario/listagem.php')
        })
        $("a[href='#cadastros']").on("click", function() {
            ajaxGenerico('#cadastros', 'paginas/usuario/cadastro.php')
        })
    });
</script>

