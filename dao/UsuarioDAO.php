<?php
require_once 'DAO.php';
require_once '../model/Usuario.php';
require_once '../model/Funcionario.php';

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
        $this->create($obj);
    }


    public function porIdUsuario($obj)
    {
        return $this->porId($obj);
    }

    public function updateUsuario($obj, $id)
    {
        $this->update($obj, $id);
    }

    public function deleteUsuario($obj, $id)
    {
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


$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();
$usuario->setPk_usuario(23);
$funcionario = new Funcionario();
$funcionario->setPk_Funcionario(1);
$usuario->setFk_Funcionario($funcionario->getPk_Funcionario());
$linha = $usuarioDAO->innerJoin($usuario, $funcionario);
for ($i = 0; $i < count($linha); $i++) {
}
print_r($linha);



