<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/model/Cargo.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/dao/CargoDAO.php");

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 13/11/2016
 * Time: 12:34
 */
class CargoController
{
    public $cargo;
    public $cargoDAO;

    public function __construct()
    {
        $this->cargo = new Cargo();
        $this->cargoDAO = new CargoDAO();

        $this->cargo->setNome(isset($_POST['nome']) ? $_POST['nome'] : null);
        $this->cargo->setDescricao(isset($_POST['descricao']) ? $_POST['descricao'] : null);


        if ($_POST['action'] == "salvar") {
            try {
                $this->salvar();
            } catch (Exception $e) {
                echo FuncoesMensagens::geraJSONMensagem($e->getMessage(), "erro");
            }
        }
        if ($_POST['action'] == "alterar") {
            try {
                $this->alterar();
            } catch (Exception $e) {
                echo FuncoesMensagens::geraJSONMensagem($e->getMessage(), "erro");
            }
        }

        if ($_POST['action'] == "excluir") {
            try {
                $this->excluir();
            } catch (Exception $e) {
                echo FuncoesMensagens::geraJSONMensagem($e->getMessage(), "erro");
            }
        }
    }

    public function salvar()
    {
        if (!$this->cargo->getNome() == "undefined" || !$this->cargo->getNome() == "") {
            if (!$this->cargo->getDescricao() == "undefined" || !$this->cargo->getDescricao() == "") {
                $this->cargoDAO->criarCargo($this->cargo);
            } else {
                echo FuncoesMensagens::geraJSONMensagem("O campo descrição não foi informado", "erro");
            }
        } else {
            echo FuncoesMensagens::geraJSONMensagem("O campo nome não foi informado", "erro");
        }
    }

    public function alterar()
    {
        if (!$this->cargo->getNome() == "undefined" || !$this->cargo->getNome() == "") {
            if (!$this->cargo->getDescricao() == "undefined" || !$this->cargo->getDescricao() == "") {
                $this->cargoDAO->updateCargo($this->cargo, $_GET['id']);
            } else {
                echo FuncoesMensagens::geraJSONMensagem("O campo descrição não foi informado", "erro");
            }
        } else {
            echo FuncoesMensagens::geraJSONMensagem("O campo nome não foi informado", "erro");
        }
    }

    public function excluir()
    {
        if(isset($_GET['id'])){
            $this->cargo->setAtivado(0);
            $this->cargoDAO->updateCargo($this->cargo, $_GET['id']);
        }else{
            echo FuncoesMensagens::geraJSONMensagem("O campo ID não foi informado", "erro");
        }
    }


}