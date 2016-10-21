<?php

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 20/10/2016
 * Time: 10:41
 */
class FuncoesString
{
    public static final function paraCaixaAlta($string)
    {
        return strtoupper($string);
    }

    public static final function paraCaixaBaixa($string)
    {
        return strtolower($string);
    }

    public static final function verificaStringExistente($string, $stringBuscada)
    {
        if (strpos($string, $stringBuscada) !== false) {
            return true;
        } else {
            return false;
        }
    }

    
}