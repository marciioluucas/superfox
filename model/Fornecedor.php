<?php

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 18:54
 */
class Fornecedor
{
    private $nome_empresarial;
    private $nome_fantasia;
    private $cpf_cnpj;
    private $ramo;
    private $representante;
    private $mei;

    /**
     * @return mixed
     */
    public function getNome_Empresarial()
    {
        return $this->nome_empresarial;
    }

    /**
     * @param mixed $nome_empresarial
     */
    public function setNome_Empresarial($nome_empresarial)
    {
        $this->nome_empresarial = $nome_empresarial;
    }

    /**
     * @return mixed
     */
    public function getNome_Fantasia()
    {
        return $this->nome_fantasia;
    }

    /**
     * @param mixed $nome_fantasia
     */
    public function setNome_Fantasia($nome_fantasia)
    {
        $this->nome_fantasia = $nome_fantasia;
    }

    /**
     * @return mixed
     */
    public function getCpf_Cnpj()
    {
        return $this->cpf_cnpj;
    }

    /**
     * @param mixed $cpf_cnpj
     */
    public function setCpf_Cnpj($cpf_cnpj)
    {
        $this->cpf_cnpj = $cpf_cnpj;
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