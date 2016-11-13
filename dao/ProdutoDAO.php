<?php
require_once("DAO.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/model/Produto.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/util/FuncoesReflections.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/util/FuncoesString.php");
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 22/10/2016
 * Time: 14:34
 */
class ProdutoDAO extends DAO
{
    public function criarProduto($obj)
    {
        $fk_produto = FuncoesReflections::pegaValorAtributoEspecifico($obj, "fk_produto");
        FuncoesReflections::injetaValorAtributo($obj,["data_cadastro","data_ultima_alteracao"],[date("Y-d-m"), date("Y-d-m")]);
        if ($this->quantidadeRegistros($obj, ["fk_produto" => $fk_produto]) == 0) {


            if($this->create($obj)){
                echo FuncoesMensagens::geraJSONMensagem("Produto cadastrado com sucesso!", "sucesso");
                return true;
            }else{
                echo FuncoesMensagens::geraJSONMensagem("Erro ao cadastrar o Produto", "erro");
                return false;
            }
        }else{
            echo FuncoesMensagens::geraJSONMensagem("Produto já Cadastrado no Sistema.", "erro");
            return false;
        }

    }
    public function porIdProduto($obj)
    {
        return $this->porId($obj);
    }

    public function updateProduto($obj, $id)
    {
        if ($this->update($obj, $id)) {
            echo FuncoesMensagens::geraJSONMensagem("Produto alterado com sucesso!", "sucesso");
            return true;
        } else {
            echo FuncoesMensagens::geraJSONMensagem("Erro ao alterar Produto.", "erro");
            return false;
        }
    }

    public function deleteProduto($obj, $id)
    {
        if ($this->update($obj, $id)) {
            echo FuncoesMensagens::geraJSONMensagem("Produto excluído com sucesso!", "sucesso");
            return true;
        } else {
            echo FuncoesMensagens::geraJSONMensagem("Erro ao deletar Produto.", "erro");
            return false;
        }
    }

}