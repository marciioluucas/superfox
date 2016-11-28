<?php
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 19:48
 */
//require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/controller/CargoController.php");
//$cargoController = new CargoController();
?>

<article>
    <section>
        <h5>Cadastro de cargo</h5>
        <div class="row">
            <div class="col s12">
                <div class="row">

                    <div class="input-field col s12 m6 l6">
                        <input id="" type="text" name="nome" class="validate nome">
                        <label for="xablau">Nome</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <select id="nivel" class="nivel" name="nivel">
                            <option value="1">Nível 1</option>
                            <option value="2">Nível 2</option>
                        </select>
                        <label for="nivel">Cargo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <textarea id="descricao" type="text" name="descricao" class="materialize-textarea"></textarea>
                        <label for="descricao">Descricao</label>
                    </div>
                </div>
                <div class="row">
                    <button class="waves-effect waves-light btn waves-light" id="enviar">Enviar</button>
                    <button class="waves-effect waves-light btn red waves-light" id="limpar-campos">Limpar campos
                    </button>
                </div>
            </div>
        </div>
    </section>
</article>
<script src="../cargo/cadastro.js"></script>
<script>$(document).ready(function () {
        $('select').material_select();
    })</script>