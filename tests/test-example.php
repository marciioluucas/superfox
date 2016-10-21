<?php
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 19:54
 */

class Pessoa
{
    public $codigo;
    public $name;
    function __construct($codigo)
    {
        $this->codigo = $codigo;
    }

    function setName($name)
    {
        $this->name = $name;
    }
}
$pessoa = new Pessoa();
$a = get_object_vars($pessoa);
print_r(array_keys($a));