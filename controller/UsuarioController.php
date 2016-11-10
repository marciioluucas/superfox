<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/model/Usuario.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/dao/UsuarioDAO.php");
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
        $this->usuario->setFk_Funcionario(isset($_POST['funcionario']) ? $_POST['funcionario'] : null);
//        echo $_POST['action'];
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
                    echo $e->getMessage();
                }
            }


        }
        if (isset($_GET['action'])) {
            if ($_GET['action'] == "sair") {
                try {
                    session_start();
                    session_destroy();
                    $msg = FuncoesMensagens::geraMensagem("Você foi deslogado com sucesso","sucesso");
                    $this->usuarioDAO->redirecionar('../view/paginas/login.php?'.$msg);
                } catch (Exception $e) {

                }
            }

        }
        return false;
    }


    public function salvar()
    {
        $this->usuarioDAO->criarUsuario($this->usuario);
    }

    public function alterar()
    {
        $this->usuarioDAO->updateUsuario($this->usuario, $_POST['id']);
    }

    public function excluir()
    {
        $this->usuarioDAO->deleteUsuario($this->usuario, $_GET['id']);
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
            $this->usuarioDAO->redirecionar("../view/paginas/login.php");
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
//
