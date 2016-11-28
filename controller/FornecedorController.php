<?php
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/model/FornecedorDAO.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/model/Fornecedor.php");
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 19:56
 */
class FornecedorController
{

    public $fornecedor;
    public $fornecedorDAO;

    public function __construct()
    {

        $this->fornecedor = new Fornecedor();
        $this->fornecedorDAO = new FornecedorDAO();

        $this->fornecedor->setRamo(isset($_POST['ramo']) ? $_POST['ramo'] : null);
        $this->fornecedor->setRepresentante(isset($_POST['representante']) ? $_POST['representante'] : null);
        $this->fornecedor->setMei(isset($_POST['mei']) ? $_POST['mei'] : null);
        $this->fornecedor->setNome(isset($_POST['nome']) ? $_POST['nome'] : null);
        $this->fornecedor->setNomeFantasia(isset($_POST['nome_fantasia']) ? $_POST['nome_fantasia'] : null);
        $this->fornecedor->setCnpj(isset($_POST['cnpj']) ? $_POST['cnpj'] : null);

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
        $this->fornecedor->setPkFornecedor($id);
        return $this->fornecedor->porIdFornecedor($this->fornecedor);
    }

    public
    function salvar()
    {
        if (!$this->fornecedor->getRamo() == "undefined" || !$this->fornecedor->getRamo() == "") {
            if (!$this->fornecedor->getRepresentante() == "undefined" || !$this->fornecedor->getRepresentante() == "") {
                if (!$this->fornecedor->getMei() == "undefined" || !$this->fornecedor->getMei() == "") {
                    if (!$this->fornecedor->getNome() == "undefined" || !$this->fornecedor->getNome() == "") {
                        if (!$this->fornecedor->getNomeFantasia() == "undefined" || !$this->fornecedor->getNomeFantasia() == "") {
                            if (!$this->fornecedor->getCnpj() == "undefined" || !$this->fornecedor->getCnpj() == "") {
                              {
                                            $this->fornecedorDAO->criarFornecedor($this->fornecedor);
                                        }
                            } else {
                                echo FuncoesMensagens::geraJSONMensagem("O campo CNPJ não foi informado", "erro");
                            }
                        } else {
                            echo FuncoesMensagens::geraJSONMensagem("O campo Nome Fantasia não foi informado", "erro");
                        }
                    } else {
                        echo FuncoesMensagens::geraJSONMensagem("O campo Nome  não foi informado", "erro");
                    }
                } else {
                    echo FuncoesMensagens::geraJSONMensagem("O campo Mei não foi informado", "erro");
                }
            } else {
                echo FuncoesMensagens::geraJSONMensagem("O campo Representante não foi informado", "erro");
            }
        } else {
            echo FuncoesMensagens::geraJSONMensagem("O campo Ramo não foi informado", "erro");
        }
    }


    public
    function alterar()
    {
        if (!$this->fornecedor->getRamo() == "undefined" || !$this->fornecedor->getRamo() == "") {
            if (!$this->fornecedor->getRepresentante() == "undefined" || !$this->fornecedor->getRepresentante() == "") {
                if (!$this->fornecedor->getMei() == "undefined" || !$this->fornecedor->getMei() == "") {
                    if (!$this->fornecedor->getNome() == "undefined" || !$this->fornecedor->getNome() == "") {
                        if (!$this->fornecedor->getNomeFantasia() == "undefined" || !$this->fornecedor->getNomeFantasia() == "") {
                            if (!$this->fornecedor->getCnpj() == "undefined" || !$this->fornecedor->getCnpj() == "") {
                                {
                                    $this->fornecedorDAO->updateFornecedor($this->fornecedor);
                                }
                            } else {
                                echo FuncoesMensagens::geraJSONMensagem("O campo CNPJ não foi informado", "erro");
                            }
                        } else {
                            echo FuncoesMensagens::geraJSONMensagem("O campo Nome Fantasia não foi informado", "erro");
                        }
                    } else {
                        echo FuncoesMensagens::geraJSONMensagem("O campo Nome  não foi informado", "erro");
                    }
                } else {
                    echo FuncoesMensagens::geraJSONMensagem("O campo Mei não foi informado", "erro");
                }
            } else {
                echo FuncoesMensagens::geraJSONMensagem("O campo Representante não foi informado", "erro");
            }
        } else {
            echo FuncoesMensagens::geraJSONMensagem("O campo Ramo não foi informado", "erro");
        }
    }

    public function excluir()
    {

        if (isset($_POST['id'])) {
            $this->fornecedor->setAtivado("0");
            return $this->fornecedorDAO->deleteFornecedor($this->fornecedor, $_POST['id']);
        } else {
            echo FuncoesMensagens::geraJSONMensagem("ID deve ser formado", "erro");
        }
        return false;
    }

    public function pesquisarFornecedor()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $nome = isset($_GET['nome']) ? $_GET['nome'] : "";

        if ($id == "" && $nome == "") {
            return $this->fornecedorDAO->pesquisarFornecedor($this->fornecedor, ["ativado" => 1]);
        } else {
            return $this->fornecedorDAO->pesquisarFornecedor($this->fornecedor, ["pk_fornecedor" => $id,
                "nome" => $nome, "ativado" => 1]);
        }


    }




}
new FornecedorController();