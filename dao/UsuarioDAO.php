<?php
require_once 'DAO.php';
require_once '../model/Usuario.php';

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 20/10/2016
 * Time: 22:24
 */
class UsuarioDAO extends DAO
{

    public function criarUsuario($obj)
    {
        $this->abrirConexao();
        $this->create($obj);
    }


    public function porIdUsuario($obj, $id)
    {
        $this->porId($obj, $id);
    }

    public function updateUsuario($obj, $id)
    {
        $this->abrirConexao();
        $this->update($obj, $id);
    }

    public function deleteUsuario($obj, $id)
    {
        $this->abrirConexao();
        $this->update($obj, $id);
    }

    public function logarUsuario()
    {
        $this->abrirConexao();
    }
}


$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();
$usuarioDAO->porId($usuario, 20);