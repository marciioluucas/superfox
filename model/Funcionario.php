<?php
require_once 'Fisica.php';
require_once 'Cargo.php';
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 25/10/2016
 * Time: 14:39
 */
class Funcionario extends Fisica
{
    private $pk_funcionario;
    private $cargo;
    private $data_cadastro;

    function __construct()
    {
        $this->cargo = new Cargo;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param mixed $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @return mixed
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * @param mixed $data_cadastro
     */
    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
    }

    /**
     * @return mixed
     */
    public function getPk_Funcionario()
    {
        return $this->pk_funcionario;
    }

    /**
     * @param mixed $pk_funcionario
     */
    public function setPk_Funcionario($pk_funcionario)
    {
        $this->pk_funcionario = $pk_funcionario;
    }





}