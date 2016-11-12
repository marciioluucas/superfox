<?php
require_once("Funcionario.php");

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 18:50
 */
class Usuario extends Funcionario
{
    private $pk_usuario;
    private $login;
    private $email;
    private $senha;
    private $data_cadastro;
    private $data_ultima_alteracao;
    private $fk_funcionario;
    private $ativado;

    /**
     * @return mixed
     */
    public function getPk_usuario()
    {
        return $this->pk_usuario;
    }

    /**
     * @param mixed $pk_usuario
     */
    public function setPk_usuario($pk_usuario)
    {
        $this->pk_usuario = $pk_usuario;
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
    public function get_Data_Ultima_Alteracao()
    {
        return $this->data_ultima_alteracao;
    }

    /**
     * @param mixed $data_ultima_alteracao
     */
    public function setData_Ultima_Alteracao($data_ultima_alteracao)
    {
        $this->data_ultima_alteracao = $data_ultima_alteracao;
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

    /**
     * @return mixed
     */
    public function getAtivado()
    {
        return $this->ativado;
    }

    /**
     * @param mixed $ativado
     */
    public function setAtivado($ativado)
    {
        $this->ativado = $ativado;
    }


}