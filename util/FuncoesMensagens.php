<?php

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 08/11/2016
 * Time: 10:31
 */
class FuncoesMensagens
{
    public static function geraJSONMensagem($mensagem, $tipo)
    {
        return json_encode(array("mensagem" => $mensagem, "tipo" =>$tipo));
    }
}