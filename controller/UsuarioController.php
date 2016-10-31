<?php
require_once("D:/xampp/htdocs/superfox/model/Usuario.php");
require_once("D:/xampp/htdocs/superfox/dao/UsuarioDAO.php");
require_once("D:/xampp/htdocs/superfox/model/Funcionario.php");

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
        if (isset($_POST['action'])) {
            if ($_POST['action'] == "logar") {
                try{

                    $this->logar();
                    $this->usuarioDAO->redirecionar('../view/index.php');
                } catch (Exception $e){
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
//                    $this->usuarioDAO->redirecionar('../view/paginas/login.php');
                } catch (Exception $e) {

                }
            }

            if($_GET['action'] == "pesquisarPorId") {

                try {
                    header('Content-Type: application/json');
                    $this->pesquisaFuncionarioPorIdParaAutoComplete($_GET['idFuncionario']);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }

    }


    public function salvar()
    {
        $this->usuarioDAO->criarUsuario($this->usuario);
    }

    public function alterar()
    {

    }

    public function excluir()
    {

    }

    public function porId()
    {

    }

    public function listarAll()
    {

    }

    public function logar()
    {
        try{
            return $this->usuarioDAO->logarUsuario($this->usuario, $this->usuario->getEmail(), $this->usuario->getSenha());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function innerJoin($obj2)
    {
        return $this->usuarioDAO->innerJoin($this->usuario, $obj2, true);
    }

    public function protecaoLoggin()
    {
        if (!isset($_SESSION)) session_start();
        if (!$this->usuarioDAO->isLogado()) {
            $this->usuarioDAO->redirecionar("../paginas/login.php");
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
        $linha = $usuarioDAO->innerJoin($usuario, $funcionario, true);

        echo $linha[$coluna];
    }


}

$uController = new UsuarioController();
session_start();
if (!isset($_SESSION['session_usuario'])) {
    $uController->usuarioDAO->redirecionar("../view/paginas/login.php");
}