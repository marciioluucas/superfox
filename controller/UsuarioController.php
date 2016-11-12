<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/model/Usuario.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/dao/UsuarioDAO.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/dao/FuncionarioDAO.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/model/Funcionario.php");

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 19:55
 */
class UsuarioController
{
    public $usuarioDAO;
    public $usuario;
    public $funcionario;
    public $callback;

    /**
     * UsuarioController constructor.
     * @throws Exception
     * @internal param $usuario
     */
    public function __construct()
    {

        $this->usuarioDAO = new UsuarioDAO();
        $this->usuario = new Usuario();
        $this->funcionario = new Funcionario();
        $this->usuario->setLogin(isset($_POST['login']) ? $_POST['login'] : null);
        $this->usuario->setEmail(isset($_POST['email']) ? $_POST['email'] : null);
        $this->usuario->setSenha(isset($_POST['senha']) ? $_POST['senha'] : null);
        if (isset($_POST['action'])) {
            if ($_POST['action'] == "logar") {
                echo "aqui";
                try {
                    $this->logar();
                } catch (Exception $e) {
                    echo $e->getMessage();
                }

            }
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
        if (isset($_GET['action'])) {
            if ($_GET['action'] == "sair") {
                try {
                    session_start();
                    session_destroy();
                    $msg = FuncoesMensagens::geraMensagem("Você foi deslogado com sucesso", "sucesso");
                    $this->usuarioDAO->redirecionar('../view/paginas/login.php?' . $msg);
                } catch (Exception $e) {

                }
            }

        }
        return false;
    }


    public function salvar()
    {
        $posStringCPF = FuncoesString::pegaPosStringDeterminada($_POST['funcionario'], "| ");
        $CPFFuncionario = FuncoesString::separaString($_POST['funcionario'], $posStringCPF);

        $funcionario = new Funcionario();
        $funcionarioDAO = new FuncionarioDAO();
        $funcionario->setCpf($CPFFuncionario);
        $pkFuncionario = $funcionarioDAO->buscaPorCondicoes($funcionario, ["cpf" => $funcionario->getCpf()], true);
        $this->usuario->setFk_Funcionario($pkFuncionario['pk_funcionario']);
        if ($_POST['funcionario'] != "undefined" || $_POST['funcionario'] != "") {
            if ($this->usuario->getEmail() != "undefined" || $this->usuario->getEmail() != "") {
                if ($this->usuario->getLogin() != "undefined" || $this->usuario->getLogin() != "") {
                    if ($this->usuario->getSenha() != "undefined" || $this->usuario->getSenha() != "") {
                        $this->usuarioDAO->criarUsuario($this->usuario);
                    } else {
                        echo FuncoesMensagens::geraJSONMensagem("O campo senha não foi informado", "erro");
                    }
                } else {
                    echo FuncoesMensagens::geraJSONMensagem("O campo login não foi informado", "erro");
                }
            } else {
                echo FuncoesMensagens::geraJSONMensagem("O campo e-mail não foi informado", "erro");
            }
        } else {
            echo FuncoesMensagens::geraJSONMensagem("O campo funcionario não foi informado", "erro");
        }
    }

    public function alterar()
    {
        $this->usuario->setPk_usuario($_POST['id']);
        $this->usuario->setData_Ultima_Alteracao(date('Y-d-m'));

        if ($this->usuario->getEmail() != "undefined" || $this->usuario->getEmail() != "") {
            if ($this->usuario->getLogin() != "undefined" || $this->usuario->getLogin() != "") {
                if ($this->usuario->getSenha() != "undefined" || $this->usuario->getSenha() != "") {
                    $this->usuarioDAO->updateUsuario($this->usuario, $_POST['id']);
                } else {
                    echo FuncoesMensagens::geraJSONMensagem("O campo senha não foi informado", "erro");
                }
            } else {
                echo FuncoesMensagens::geraJSONMensagem("O campo login não foi informado", "erro");
            }
        } else {
            echo FuncoesMensagens::geraJSONMensagem("O campo e-mail não foi informado", "erro");
        }

    }

    public function excluir()
    {
        if (isset($_POST['id'])) {
            $this->usuario->setAtivado("0");
            $this->usuarioDAO->deleteUsuario($this->usuario, $_POST['id']);
        } else {
            echo FuncoesMensagens::geraJSONMensagem("ID deve ser formado", "erro");
        }
    }

    public function porId($pk_usuario)
    {
        $this->usuario->setPk_usuario($pk_usuario);
        return $this->usuarioDAO->porIdUsuario($this->usuario);
    }

    public function listarAll()
    {

    }

    public function logar()
    {
        try {
            $this->usuarioDAO->logarUsuario($this->usuario, $this->usuario->getEmail(), $this->usuario->getSenha());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function innerJoin($obj2, $condicoes)
    {
        return $this->usuarioDAO->innerJoin($this->usuario, $obj2, $condicoes);
    }

    public function protecaoLoggin()
    {
        if (!isset($_SESSION)) session_start();
        if (!$this->usuarioDAO->isLogado()) {
            $this->usuarioDAO->redirecionar("../../../view/paginas/login.php");
        }
    }

    public function infoUsuarioLogado($coluna)
    {
        $usuario = new Usuario();
        $usuarioDAO = new UsuarioDAO();
        $usuario->setPk_usuario($_SESSION['session_usuario']);
        $linhaUsuario = $usuarioDAO->porId($usuario);
        $funcionario = new Funcionario();
        $funcionario->setPk_Funcionario($linhaUsuario['fk_funcionario']);
        $usuario->setFk_Funcionario($funcionario->getPk_Funcionario());
        $linha = $this->usuarioDAO->innerJoin($usuario, $funcionario, ["pk_usuario" => $usuario->getPk_usuario()], true);
        echo $linha[$coluna];
    }

    public function pesquisarUsuario()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
        $email = isset($_GET['email']) ? $_GET['email'] : "";
        $login = isset($_GET['login']) ? $_GET['login'] : "";
//        echo $_GET['nome'];
        if ($id == "" && $nome == "" && $email == "" && $login == "") {
            return $this->usuarioDAO->pesquisarUsuario($this->usuario, $this->funcionario);
        } else {
            return $this->usuarioDAO->pesquisarUsuario($this->usuario, $this->funcionario, ["pk_usuario" => $id,
                "nome" => $nome, "email" => $email, "login" => $login]);
        }
    }


}

new UsuarioController();
