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
$pessoa = new Pessoa(1);
$pessoa->setName("Marcio");
$a = get_object_vars($pessoa);
$arr = array_keys($a);

print_r($a);
print_r($arr);