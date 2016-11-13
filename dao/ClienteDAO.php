<?php
require_once("DAO.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/model/Cliente.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/util/FuncoesReflections.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/util/FuncoesString.php");
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 22/10/2016
 * Time: 14:33
 */
class ClienteDAO extends DAO
{
    public function criarCliente($obj)
    {
        $fk_cliente = FuncoesReflections::pegaValorAtributoEspecifico($obj, "fk_cliente");
        FuncoesReflections::injetaValorAtributo($obj,["data_cadastro","data_ultima_alteracao"],[date("Y-d-m"), date("Y-d-m")]);
        if ($this->quantidadeRegistros($obj, ["fk_cliente" => $fk_cliente]) == 0) {


            if($this->create($obj)){
                echo FuncoesMensagens::geraJSONMensagem("Cliente cadastrado com sucesso!", "sucesso");
                return true;
            }else{
                echo FuncoesMensagens::geraJSONMensagem("Erro ao cadastrar o Cliente", "erro");
                return false;
            }
        }else{
            echo FuncoesMensagens::geraJSONMensagem("Cliente já Cadastrado no Sistema.", "erro");
            return false;
        }

    }

    public function porIdCliente($obj)
    {
        return $this->porId($obj);
    }

    public function updateCliente($obj, $id)
    {
        if ($this->update($obj, $id)) {
            echo FuncoesMensagens::geraJSONMensagem("Cliente alterado com sucesso!", "sucesso");
            return true;
        } else {
            echo FuncoesMensagens::geraJSONMensagem("Erro ao alterar cliente.", "erro");
            return false;
        }
    }

    public function deleteCliente($obj, $id){
        if ($this->update($obj, $id)) {
            echo FuncoesMensagens::geraJSONMensagem("Cliente deletado com sucesso!", "sucesso");
            return true;
        } else {
            echo FuncoesMensagens::geraJSONMensagem("Erro ao deletar Cliente.", "erro");
            return false;
        }

    }

}