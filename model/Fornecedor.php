<?php

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 18:54
 */
class Fornecedor extends Juridica
{
    private  $pk_fornecedor;


    private $ramo;
    private $representante;
    private $mei;
    private $ativado;



    /**
     * @return mixed
     */
    public function getPkFornecedor()
    {
        return $this->pk_fornecedor;
    }

    /**
     * @param mixed $pk_fornecedor
     */
    public function setPkFornecedor($pk_fornecedor)
    {
        $this->pk_fornecedor = $pk_fornecedor;
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
    public function getRamo()
    {
        return $this->ramo;
    }

    /**
     * @param mixed $ramo
     */
    public function setRamo($ramo)
    {
        $this->ramo = $ramo;
    }

    /**
     * @return mixed
     */
    public function getRepresentante()
    {
        return $this->representante;
    }

    /**
     * @param mixed $representante
     */
    public function setRepresentante($representante)
    {
        $this->representante = $representante;
    }

    /**
     * @return mixed
     */
    public function getMei()
    {
        return $this->mei;
    }

    /**
     * @param mixed $mei
     */
    public function setMei($mei)
    {
        $this->mei = $mei;
    }


}