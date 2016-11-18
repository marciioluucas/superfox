<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/model/Cargo.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/dao/CargoDAO.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/util/FuncoesMensagens.php");

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

        if (isset($_POST['action'])) {


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
    }

    public function porId($id)
    {
        $this->cargo->setPk_Cargo($id);
        return $this->cargoDAO->porIdCargo($this->cargo);
    }

    public
    function salvar()
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

    public
    function alterar()
    {
        if (!$this->cargo->getNome() == "undefined" || !$this->cargo->getNome() == "") {
            if (!$this->cargo->getDescricao() == "undefined" || !$this->cargo->getDescricao() == "") {
                $this->cargoDAO->updateCargo($this->cargo, $_POST['id']);
            } else {
                echo FuncoesMensagens::geraJSONMensagem("O campo descrição não foi informado", "erro");
            }
        } else {
            echo FuncoesMensagens::geraJSONMensagem("O campo nome não foi informado", "erro");
        }
    }

    public function excluir()
    {

        if (isset($_POST['id'])) {
            $this->cargo->setPk_Cargo($_POST['id']);
            if($this->cargo->verificaCargoAtivadoNoFuncionario()){
                $this->cargo->setAtivado("0");
                return $this->cargoDAO->deleteCargo($this->cargo, $_POST['id']);
            }else{
                echo FuncoesMensagens::geraJSONMensagem("Impossível excluir pois possuem funcionarios com este cargo", "erro");
                return false;
            }

        } else {
            echo FuncoesMensagens::geraJSONMensagem("ID deve ser formado", "erro");
            return false;
        }
    }

    public
    function pesquisarCargo()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
        if ($id == "" && $nome == "") {
            return $this->cargoDAO->pesquisarCargo($this->cargo, ["ativado" => 1]);
        } else {
            return $this->cargoDAO->pesquisarCargo($this->cargo, ["pk_cargo" => $id,
                "nome" => $nome, "ativado" => 1]);
        }


    }


}

new CargoController();