<?php
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 19:54
 */
require_once '../util/FuncoesMensagens.php';
//echo $_POST['nome'];
echo FuncoesMensagens::geraJSONMensagem($_POST['nome'], "sucesso");