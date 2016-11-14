<?php
require_once("DAO.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/model/Cargo.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/util/FuncoesReflections.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/util/FuncoesString.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/util/FuncoesMensagens.php");

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 22/10/2016
 * Time: 14:33
 */
class CargoDAO extends DAO
{
    public function criarCargo($obj)
    {
        $nome_cargo = FuncoesReflections::pegaValorAtributoEspecifico($obj, "nome");
        FuncoesReflections::injetaValorAtributo($obj,["data_cadastro","data_ultima_alteracao"],[date("Y-d-m"), date("Y-d-m")]);
        if ($this->quantidadeRegistros($obj, ["nome" => $nome_cargo]) == 0) {
            if($this->create($obj)){
                echo FuncoesMensagens::geraJSONMensagem("Cargo cadastrado com sucesso!", "sucesso");
                return true;
            }else{
                echo FuncoesMensagens::geraJSONMensagem("Erro ao cadastrar o cargo", "erro");
                return false;
            }
        }else{
            echo FuncoesMensagens::geraJSONMensagem("Cargo já cadastrado no sistema.", "erro");
            return false;
        }

    }

    public function porIdCargo($obj)
    {
        return $this->porId($obj);
    }

    public function updateCargo($obj, $id)
    {
        if ($this->update($obj, $id)) {
            echo FuncoesMensagens::geraJSONMensagem("Cargo alterado com sucesso!", "sucesso");
            return true;
        } else {
            echo FuncoesMensagens::geraJSONMensagem("Erro ao alterar Cargo.", "erro");
            return false;
        }
    }

    public function deleteCargo($obj, $id)
    {
        if ($this->update($obj, $id)) {
            echo FuncoesMensagens::geraJSONMensagem("Cargo deletado com sucesso!", "sucesso");
            return true;
        } else {
            echo FuncoesMensagens::geraJSONMensagem("Erro ao Deletar Cargo.", "erro");
            return false;
        }
    }

}
$cargoDAO = new CargoDAO();
$cargo = new Cargo();

$cargo->setNome("asdasddt");
$cargo->setDescricao("423423");
$cargo->setData_Cadastro(date("Y-m-d"));
$cargo->setData_Ultima_Alteracao(date("Y-m-d"));

$cargoDAO->criarCargo($cargo);