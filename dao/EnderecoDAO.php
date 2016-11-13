<?php
require_once("DAO.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/model/Endereco.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/util/FuncoesReflections.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/util/FuncoesString.php");
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 22/10/2016
 * Time: 14:33
 */
class EnderecoDAO extends DAO
{

    public function criarEndereco($obj)
    {
        $fk_endereco = FuncoesReflections::pegaValorAtributoEspecifico($obj, "fk_endereco");
        FuncoesReflections::injetaValorAtributo($obj,["data_cadastro","data_ultima_alteracao"],[date("Y-d-m"), date("Y-d-m")]);
        if ($this->quantidadeRegistros($obj, ["fk_endereco" => $fk_endereco]) == 0) {


            if($this->create($obj)){
                echo FuncoesMensagens::geraJSONMensagem("Endereco cadastrado com sucesso!", "sucesso");
                return true;
            }else{
                echo FuncoesMensagens::geraJSONMensagem("Erro ao cadastrar o Endereco", "erro");
                return false;
            }
        }else{
            echo FuncoesMensagens::geraJSONMensagem("Endereço já Cadastrado no Sistema.", "erro");
            return false;
        }

    }

    public function porIdEndereco($obj)
    {
       return $this->porId($obj);
    }

    public function updateEndereco($obj, $id)
    {
        if ($this->update($obj, $id)) {
            echo FuncoesMensagens::geraJSONMensagem("Endereço alterado com sucesso!", "sucesso");
            return true;
        } else {
            echo FuncoesMensagens::geraJSONMensagem("Erro ao alterar o Endereço", "erro");
            return false;
        }
    }
    public function deleteEndereco($obj, $id)
    {
        if ($this->update($obj, $id)) {
            echo FuncoesMensagens::geraJSONMensagem("Cliente alterado com sucesso!", "sucesso");
            return true;
        } else {
            echo FuncoesMensagens::geraJSONMensagem("Erro ao alterar cliente.", "erro");
            return false;
        }
    }

}