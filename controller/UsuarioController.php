<?php

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 19:55
 */
class UsuarioController
{
    private $usuarioDAO;
    private $usuario;

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
        if ($_POST['action'] == "salvar") {
            try {
                $this->salvar();
            } catch (Exception $e) {
                throw new Exception("Nao foi possível atribuir os valores no controller: ");
            }
        }
    }


    public function salvar()
    {
        $this->usuarioDAO->create($this->usuario);
    }

    public function alterar() {

    }

    public function excluir() {

    }

    public function porId() {

    }

    public function listarAll() {

    }

    public function logar() {

    }


}