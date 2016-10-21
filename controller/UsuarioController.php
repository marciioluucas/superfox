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
     * @param $usuario
     */
    public function __construct()
    {
        $this->usuarioDAO = new UsuarioDAO();
        if ($_POST['action'] == "salvar") {
            $login = isset($_POST['login']) ? $_POST['login'] : null;
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
            $this->usuario = new Usuario($login, $email, $senha);
            $this->salvar();
        }
    }


    public function salvar()
    {
        $this->usuarioDAO->create($this->usuario);
    }


}