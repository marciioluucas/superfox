<?php

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 19:03
 */
class Endereco
{
    private $fk_fornecedor;
    private $fk_cliente;
    private $cidade;
    private $estado;
    private $rua;
    private $setor;
    private $logradouro;
    private $cep;

    /**
     * @return mixed
     */
    public function getFkFornecedor()
    {
        return $this->fk_fornecedor;
    }

    /**
     * @param mixed $fk_fornecedor
     */
    public function setFkFornecedor($fk_fornecedor)
    {
        $this->fk_fornecedor = $fk_fornecedor;
    }

    /**
     * @return mixed
     */
    public function getFkCliente()
    {
        return $this->fk_cliente;
    }

    /**
     * @param mixed $fk_cliente
     */
    public function setFkCliente($fk_cliente)
    {
        $this->fk_cliente = $fk_cliente;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @param mixed $rua
     */
    public function setRua($rua)
    {
        $this->rua = $rua;
    }

    /**
     * @return mixed
     */
    public function getSetor()
    {
        return $this->setor;
    }

    /**
     * @param mixed $setor
     */
    public function setSetor($setor)
    {
        $this->setor = $setor;
    }

    /**
     * @return mixed
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * @param mixed $logradouro
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }


}