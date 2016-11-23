<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/model/Funcionario.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/dao/CargoDAO.php");

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 22/10/2016
 * Time: 14:33
 */
class Cargo
{
    private $pk_cargo;
    private $nome;
    private $descricao;
    private $data_cadastro;
    private $data_ultima_alteracao;
    private $ativado;

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getPk_Cargo()
    {
        return $this->pk_cargo;
    }

    /**
     * @param mixed $pk_cargo
     */
    public function setPk_Cargo($pk_cargo)
    {
        $this->pk_cargo = $pk_cargo;
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
    public function getData_Ultima_Alteracao()
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


    public function verificaCargoAtivadoNoFuncionario()
    {
        $funcionario = new Funcionario();
        $cargoDAO = new CargoDAO();
        if ($cargoDAO->quantidadeRegistros($funcionario, ["fk_cargo" => $this->pk_cargo]) > 0) {
            return false;
        }else{
            return true;
        }
    }


}