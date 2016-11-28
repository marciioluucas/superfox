<?php
require_once("DAO.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/model/Fornecedor.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/util/FuncoesReflections.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/util/FuncoesString.php");
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 22/10/2016
 * Time: 14:33
 */
class FornecedorDAO extends DAO
{



    public function criarFornecedor($obj)
    {
        $fk_fornecedor = FuncoesReflections::pegaValorAtributoEspecifico($obj, "fk_fornecedor");
        FuncoesReflections::injetaValorAtributo($obj,["data_cadastro","data_ultima_alteracao"],[date("Y-d-m"), date("Y-d-m")]);
        if ($this->quantidadeRegistros($obj, ["fk_fornecedor" => $fk_fornecedor]) == 0) {


            if($this->create($obj)){
                echo FuncoesMensagens::geraJSONMensagem("Fornecedor cadastrado com sucesso!", "sucesso");
                return true;
            }else{
                echo FuncoesMensagens::geraJSONMensagem("Erro ao cadastrar o Fornecedor", "erro");
                return false;
            }
        }else{
            echo FuncoesMensagens::geraJSONMensagem("Fornecedor já Cadastrado no Sistema.", "erro");
            return false;
        }

    }

    public function porIdFornecedor($obj)
    {
        return $this->porId($obj);
    }

    public function updateFornecedor($obj, $id)
    {
        if ($this->update($obj, $id)){
            echo FuncoesMensagens::geraJSONMensagem("Usuario alterado com sucesso", "sucesso");
            return true;
        }else {
            echo FuncoesMensagens::geraJSONMensagem("Erro ao alterar usuario", "erro");
            return false;
    }
    }

    public function deleteFornecedor($obj, $id)
    {
        if ($this->update($obj, $id)) {
            echo FuncoesMensagens::geraJSONMensagem("Fornecedor Deletado com sucesso!", "sucesso");
            return true;
        } else {
            echo FuncoesMensagens::geraJSONMensagem("Erro ao Deletar o Fornecedor.", "erro");
            return false;
        }
    }
    public function pesquisarFornecedor($obj, $condicoes = [])
    {
        return $this->buscaPorCondicoes($obj, $condicoes);
    }
}