<?php

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 24/10/2016
 * Time: 10:39
 */
class Juridica extends Pessoa
{
    private $nome_empresarial;
    private $nome_fantasia;
    private $cnpj;

    /**
     * @return mixed
     */
    public function getNomeEmpresarial()
    {
        return $this->nome_empresarial;
    }

    /**
     * @param mixed $nome_empresarial
     */
    public function setNomeEmpresarial($nome_empresarial)
    {
        $this->nome_empresarial = $nome_empresarial;
    }

    /**
     * @return mixed
     */
    public function getNomeFantasia()
    {
        return $this->nome_fantasia;
    }

    /**
     * @param mixed $nome_fantasia
     */
    public function setNomeFantasia($nome_fantasia)
    {
        $this->nome_fantasia = $nome_fantasia;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }




}