<?php

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 22/10/2016
 * Time: 14:33
 */
class Cargo extends Funcionario
{
    private $nomeCargo;
    private $descricao;

    /**
     * @return mixed
     */
    public function getNomeCargo()
    {
        return $this->nomeCargo;
    }

    /**
     * @param mixed $nomeCargo
     */
    public function setNomeCargo($nomeCargo)
    {
        $this->nomeCargo = $nomeCargo;
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
}