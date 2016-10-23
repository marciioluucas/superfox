<?php
require_once 'DAO.php';
require_once '../model/Usuario.php';
require_once '../util/FuncoesReflections.php';
require_once '../util/FuncoesString.php';

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


    public function porId($id)
    {
        // TODO: Implement porId() method.
    }

    public function updateUsuario($obj)
    {
        $this->abrirConexao();
        $this->update($obj);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}


$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();
print_r($usuarioDAO->updateUsuario($usuario));