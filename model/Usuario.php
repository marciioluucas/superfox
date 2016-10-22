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
    private $data_cadastro;
    private $fk_funcionario;


    function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getData_Cadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * @param mixed $data_cadastro
     */
    public function setData_Cadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
    }

    /**
     * @return mixed
     */
    public function getFk_Funcionario()
    {
        return $this->fk_funcionario;
    }

    /**
     * @param mixed $fk_funcionario
     */
    public function setFk_Funcionario($fk_funcionario)
    {
        $this->fk_funcionario = $fk_funcionario;
    }


}