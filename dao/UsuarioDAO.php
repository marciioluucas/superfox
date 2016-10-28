<?php
require_once 'DAO.php';
require_once 'D:/xampp/htdocs/superfox/model/Usuario.php';
require_once 'D:/xampp/htdocs/superfox/model/Funcionario.php';

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
        $fk_funcionario = FuncoesReflections::pegaValorAtributoEspecifico($obj, "fk_funcionario");
        if($this->quantidadeRegistros($obj,["fk_funcionario"=>$fk_funcionario] == 0)){
            $this->create($obj);
            return "Usuario cadastrado com sucesso!";
        }
        return "Funcionário já relacionado com um usuário!";
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
            $qntRegistros = $this->quantidadeRegistros($obj, ["email" => $email, "senha" => $senha]);
            $linhaUsuario = $this->buscaPorCondicoes($obj, ["email" => $email, "senha" => $senha]);

            if ($qntRegistros > 0) {
                if (!isset($_SESSION['session_usuario'])) session_start();
                $_SESSION['session_usuario'] = $linhaUsuario['pk_usuario'];
                return true;
            } else {
                return false;
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
        echo "aqi";
        session_destroy();
        unset($_SESSION);
        return true;
    }

    public function redirecionar($url)
    {
        header("Location: $url");
    }


}


$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();
$usuario->setPk_usuario(26);
$funcionario = new Funcionario();
$funcionario->setPk_Funcionario(4);
$usuario->setFk_Funcionario($funcionario->getPk_Funcionario());
$linha = $usuarioDAO->innerJoin($usuario, $funcionario, true);
for ($i = 0; $i < count($linha); $i++) {

}



