<?php
require_once 'D:/xampp/htdocs/superfox/model/Usuario.php';
require_once 'D:/xampp/htdocs/superfox/dao/UsuarioDAO.php';
require_once 'D:/xampp/htdocs/superfox/model/Funcionario.php';

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

    /**
     * UsuarioController constructor.
     * @throws Exception
     * @internal param $usuario
     */
    public function __construct()
    {

        $this->usuarioDAO = new UsuarioDAO();
        $this->usuario = new Usuario();
        $this->usuario->setLogin(isset($_POST['login']) ? $_POST['login'] : null);
        $this->usuario->setEmail(isset($_POST['email']) ? $_POST['email'] : null);
        $this->usuario->setSenha(isset($_POST['senha']) ? $_POST['senha'] : null);
        $this->usuario->setFk_Funcionario(isset($_POST['funcionario']) ? $_POST['funcionario'] : null);
        if (isset($_POST['action'])) {
            if ($_POST['action'] == "logar") {
                if($this->logar()){
                    $this->usuarioDAO->redirecionar('../view/layout/layout.php');
                }
            }
            if ($_POST['action'] == "salvar") {
                try {
                    $this->salvar();
                } catch (Exception $e) {
                    throw new Exception("Nao foi possível atribuir os valores no controller: ");
                }
            }
        }

    }


    public function salvar()
    {
        $this->usuarioDAO->create($this->usuario);
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
      return  $this->usuarioDAO->logarUsuario($this->usuario, $this->usuario->getEmail(), $this->usuario->getSenha());

    }

    public function innerJoin($obj2)
    {
        $this->usuarioDAO->innerJoin($this->usuario, $obj2, true);
    }

    public function protecaoLoggin()
    {
        session_start();
        if (!$this->usuarioDAO->isLogado()) {
            $this->usuarioDAO->redirecionar("../paginas/login.php");
        }
    }

    public function infoUsuarioLogado($coluna)
    {
        $funcionario = new Funcionario();
        $funcionario->setPk_Funcionario($_SESSION['session_usuario']);
        $usuario = $this->innerJoin($funcionario);
        echo $usuario[$coluna];
    }


}

new UsuarioController();