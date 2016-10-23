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
     return $this->porId($obj,$id);
    }

    public function updateUsuario($obj,$id)
    {
        $this->abrirConexao();
        $this->update($obj, $id);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}


$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();
while($linha = $usuarioDAO->porIdUsuario($usuario,20)){
    print_r($linha['email']. "\n");
};