<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/model/Produto.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/dao/ProdutoDAO.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/util/FuncoesMensagens.php");
/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 19:56
 */
class ProdutoController
{
    public $produto;
    public $produtoDAO;

    public function __construct()
    {

        $this->produto = new Produto();
        $this->produtoDAO = new ProdutoDAO();

        $this->produto->setCodigoDeBarras(isset($_POST['codigo_de_barras']) ? $_POST['codigo_de_barras'] : null);
        $this->produto->setNome(isset($_POST['nome']) ? $_POST['nome'] : null);
        $this->produto->setLote(isset($_POST['lote']) ? $_POST['lote'] : null);
        $this->produto->setValidade(isset($_POST['validade']) ? $_POST['validade'] : null);
        $this->produto->setMarca(isset($_POST['marca']) ? $_POST['marca'] : null);
        $this->produto->setFabricacao(isset($_POST['fabricacao']) ? $_POST['fabricacao'] : null);
        $this->produto->setPreco(isset($_POST['preco']) ? $_POST['preco'] : null);
        $this->produto->setQuantidade(isset($_POST['quantidade']) ? $_POST['quantidade'] : null);
        $this->produto->setQuantidadeMinima(isset($_POST['quantidade_minima']) ? $_POST['quantidade_minima'] : null);

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
        $this->produto->setPkProduto($id);
        return $this->produtoDAO->porIdProduto($this->produto);
    }

    public
    function salvar()
    {
        if (!$this->produto->getNome() == "undefined" || !$this->produto->getNome() == "") {
            if (!$this->produto->getCodigoDeBarras() == "undefined" || !$this->produto->getCodigoDeBarras() == "") {
                if (!$this->produto->getFabricacao() == "undefined" || !$this->produto->getFabricacao() == "") {
                    if (!$this->produto->getLote() == "undefined" || !$this->produto->getLote() == "") {
                        if (!$this->produto->getMarca() == "undefined" || !$this->produto->getMarca() == "") {
                            if (!$this->produto->getPreco() == "undefined" || !$this->produto->getPreco() == "") {
                                if (!$this->produto->getValidade() == "undefined" || !$this->produto->getValidade() == "") {
                                    if (!$this->produto->getQuantidade() == "undefined" || !$this->produto->getQuantidade() == "") {
                                        if (!$this->produto->getQuantidadeMinima() == "undefined" || !$this->produto->getQuantidadeMinima() == "") {
                                            $this->produtoDAO->criarProduto($this->produto);
                                        } else {
                                            echo FuncoesMensagens::geraJSONMensagem("O campo Quantidade Mínima não foi informado", "erro");
                                        }
                                        } else {
                                        echo FuncoesMensagens::geraJSONMensagem("O campo Quantidade não foi informado", "erro");
                                    }
                                        } else {
                                    echo FuncoesMensagens::geraJSONMensagem("O campo Validade não foi informado", "erro");
                                }
                                        } else {
                                echo FuncoesMensagens::geraJSONMensagem("O campo Preço não foi informado", "erro");
                            }
                                        } else {
                            echo FuncoesMensagens::geraJSONMensagem("O campo Marca não foi informado", "erro");
                        }
                                        } else {
                        echo FuncoesMensagens::geraJSONMensagem("O campo Lote não foi informado", "erro");
                    }
                                        } else {
                    echo FuncoesMensagens::geraJSONMensagem("O campo Fabricação não foi informado", "erro");
                }
                                        } else {
                echo FuncoesMensagens::geraJSONMensagem("O campo Código de Barras não foi informado", "erro");
            }
                                        } else {
            echo FuncoesMensagens::geraJSONMensagem("O campo Nome não foi informado", "erro");
        }
    }


    public
    function alterar()
    {
        if (!$this->produto->getNome() == "undefined" || !$this->produto->getNome() == "") {
            if (!$this->produto->getCodigoDeBarras() == "undefined" || !$this->produto->getCodigoDeBarras() == "") {
                if (!$this->produto->getFabricacao() == "undefined" || !$this->produto->getFabricacao() == "") {
                    if (!$this->produto->getLote() == "undefined" || !$this->produto->getLote() == "") {
                        if (!$this->produto->getMarca() == "undefined" || !$this->produto->getMarca() == "") {
                            if (!$this->produto->getPreco() == "undefined" || !$this->produto->getPreco() == "") {
                                if (!$this->produto->getValidade() == "undefined" || !$this->produto->getValidade() == "") {
                                    if (!$this->produto->getQuantidade() == "undefined" || !$this->produto->getQuantidade() == "") {
                                        if (!$this->produto->getQuantidadeMinima() == "undefined" || !$this->produto->getQuantidadeMinima() == "") {
                                            $this->produtoDAO->updateProduto($this->produto, $_POST['id']);
                                        } else {
                                            echo FuncoesMensagens::geraJSONMensagem("O campo Quantidade Mínima não foi informado", "erro");
                                        }
                                    } else {
                                        echo FuncoesMensagens::geraJSONMensagem("O campo Quantidade não foi informado", "erro");
                                    }
                                } else {
                                    echo FuncoesMensagens::geraJSONMensagem("O campo Validade não foi informado", "erro");
                                }
                            } else {
                                echo FuncoesMensagens::geraJSONMensagem("O campo Preço não foi informado", "erro");
                            }
                        } else {
                            echo FuncoesMensagens::geraJSONMensagem("O campo Marca não foi informado", "erro");
                        }
                    } else {
                        echo FuncoesMensagens::geraJSONMensagem("O campo Lote não foi informado", "erro");
                    }
                } else {
                    echo FuncoesMensagens::geraJSONMensagem("O campo Fabricação não foi informado", "erro");
                }
            } else {
                echo FuncoesMensagens::geraJSONMensagem("O campo Código de Barras não foi informado", "erro");
            }
        } else {
            echo FuncoesMensagens::geraJSONMensagem("O campo Nome não foi informado", "erro");
        }
    }

    public function excluir()
    {

        if (isset($_POST['id'])) {
            $this->produto->setAtivado("0");
            return $this->produtoDAO->deleteProduto($this->produto, $_POST['id']);
        } else {
            echo FuncoesMensagens::geraJSONMensagem("ID deve ser formado", "erro");
        }
        return false;
    }

    public function pesquisarCargo()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $nome = isset($_GET['nome']) ? $_GET['nome'] : "";

        if ($id == "" && $nome == "") {
            return $this->produtoDAO->pesquisarProduto($this->produto, ["ativado" => 1]);
        } else {
            return $this->produtoDAO->pesquisarProduto($this->produto, ["pk_produto" => $id,
                "nome" => $nome, "ativado" => 1]);
        }


    }




}

new ProdutoController();