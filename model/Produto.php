<?php

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 18:54
 */
class Produto
{
    private $pk_produto;
    private $codigo_de_barras;
    private $nome;
    private $marca;
    private $lote;
    private $validade;
    private $fabricacao;
    private $preco;
    private $quantidade;
    private $quantidade_minima;
    private $ativado;

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
    public function getCodigoDeBarras()
    {
        return $this->codigo_de_barras;
    }

    /**
     * @param mixed $codigo_de_barras
     */
    public function setCodigoDeBarras($codigo_de_barras)
    {
        $this->codigo_de_barras = $codigo_de_barras;
    }

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
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getLote()
    {
        return $this->lote;
    }

    /**
     * @param mixed $lote
     */
    public function setLote($lote)
    {
        $this->lote = $lote;
    }

    /**
     * @return mixed
     */
    public function getValidade()
    {
        return $this->validade;
    }

    /**
     * @param mixed $validade
     */
    public function setValidade($validade)
    {
        $this->validade = $validade;
    }

    /**
     * @return mixed
     */
    public function getFabricacao()
    {
        return $this->fabricacao;
    }

    /**
     * @param mixed $fabricacao
     */
    public function setFabricacao($fabricacao)
    {
        $this->fabricacao = $fabricacao;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    /**
     * @return mixed
     */
    public function getQuantidadeMinima()
    {
        return $this->quantidade_minima;
    }

    /**
     * @param mixed $quantidade_minima
     */
    public function setQuantidadeMinima($quantidade_minima)
    {
        $this->quantidade_minima = $quantidade_minima;
    }

    public function getPkProduto()
    {
        return $this->pk_produto;
    }


    public function setPkProduto($pk_produto)
    {
        $this->pk_produto = $pk_produto;
    }


}