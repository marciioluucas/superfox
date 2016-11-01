<?php
require_once("DAO.php");
require_once("../model/Usuario.php");
require_once("../model/Funcionario.php");

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 20/10/2016
 * Time: 22:24
 */
class UsuarioDAO extends DAO
{

    /**
     * @param $obj
     * @return string
     */
    public function criarUsuario($obj)
    {
        $fk_funcionario = FuncoesReflections::pegaValorAtributoEspecifico($obj, "fk_funcionario");
        if ($this->quantidadeRegistros($obj, ["fk_funcionario" => $fk_funcionario]) == 0) {
            $this->create($obj);
            return "Usuario cadastrado com sucesso!";
        }
        return "Funcionário já relacionado com um usuário!";
    }


    /**
     * @param $obj
     * @return mixed
     */
    public function porIdUsuario($obj)
    {
        return $this->porId($obj);
    }

    /**
     * @param $obj
     * @param $id
     */
    public function updateUsuario($obj, $id)
    {
        $this->update($obj, $id);
    }

    /**
     * Apagar o usuário.
     * @param $obj
     * @param $id
     */
    public function deleteUsuario($obj, $id)
    {
        $this->update($obj, $id);
    }

    /**
     * Aqui é o seguinte, voce pesquisa o usuário fazendo innerjoin com outra tabela. Este método foi feito para
     * a pesquisa de usuario na listagem do mesmo, mas para que as informações venham completas, precisamos fazer
     * a junção com a tabela de Funcionário.
     * @param $obj1
     * @param $obj2
     * @param $condicoes
     */
    public function pesquisarUsuario($obj1, $obj2, $condicoes) {
        $this->innerJoin($obj1, $obj2, $condicoes, false);
    }


    /**
     * Este método faz o login de usuário.
     * @param $obj
     * @param $email
     * @param $senha
     * @return bool|string
     * @throws Exception
     */
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
                return "Usuário e/ou senha não ou não conhecidem existem.";
            }
        } catch (Exception $e) {
            throw new Exception("Erro ao logar", 0, $e);
        }
    }

    /**
     * Vê se a sessão do usuário existe ou não.
     * @return bool
     */
    public function isLogado()
    {
        if (isset($_SESSION['session_usuario'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Função de logout do usuário
     * @return bool
     */
    public function sair()
    {
        session_destroy();
        unset($_SESSION);
        return true;
    }

    /**
     * Redirecionamento para uma página.
     * @param $url
     */
    public function redirecionar($url)
    {
        header("Location: $url");
    }




}

//
//$usuario = new Usuario();
//$usuarioDAO = new UsuarioDAO();
//$usuario->setPk_usuario(23);
//$funcionario = new Funcionario();
//$funcionario->setPk_Funcionario(3);
//$usuario->setFk_Funcionario($funcionario->getPk_Funcionario());
//$linha = $usuarioDAO->innerJoin($usuario, $funcionario, ["pk_usuario" => $usuario->getPk_usuario()]);
//for ($i = 0; $i < count($linha); $i++) {
//
//}



