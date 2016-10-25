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

    public function logarUsuario($obj, $email, $senha)
    {
        try {
            $this->abrirConexao();
            $qntRegistros = $this->quantidadeRegistros($obj, ["email" => $email, "senha" => $senha]);
            $linhaUsuario = $this->buscaPorCondicoes($obj, ["email" => $email, "senha" => $senha]);
            if ($qntRegistros > 0) {
                $_SESSION['session_usuario'] = $linhaUsuario['pk_usuario'];
                return true;
            } else {
                return "Usuario não encontrado";
            }
        } catch (Exception $e) {
            throw new Exception("Erro ao logar", 0, $e);
        }
    }

    public function isLogado()
    {
        if (isset($_SESSION['session_usuario'])) {
            return true;
        } else {
            return false;
        }
    }

    public function sair()
    {
        session_destroy();
        unset($_SESSION['session_usuario']);
        return true;
    }

    public function redirecionar($url)
    {
        header("Location: $url");
    }
}

//
//
//$usuario = new Usuario();
//$usuarioDAO = new UsuarioDAO();
//$usuarioDAO->porId($usuario, 20);
$nice = ["email" => "marciioluucas@gmail.com", "senha" => "123456789"];
$a = array_keys($nice);
for ($i = 0; $i < count($nice); $i++) {
//    print_r($a[$i]);
}
for ($j = 0; $j < count($nice); $j++) {
    print_r($nice[$a[$j]]);
}