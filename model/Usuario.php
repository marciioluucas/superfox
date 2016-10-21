<?php

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 18:50
 */
class Usuario
{
    private $login;
    private $email;
    private $senha;

    function __construct($login, $email, $senha)
    {
        $this->login = $login;
        $this->email = $email;
        $this->senha = $senha;
    }
}