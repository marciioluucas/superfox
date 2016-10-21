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

        if($_POST['action'] == "salvar") {

            $this->salvar();
        }
    }


    public function salvar()
    {
        $this->usuarioDAO->create($this->usuario);
    }


}