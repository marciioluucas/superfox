<?php
require_once("DAO.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/model/Usuario.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/model/Funcionario.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/util/FuncoesMensagens.php");

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
        FuncoesReflections::injetaValorAtributo($obj,["data_cadastro","data_ultima_alteracao"],[date("Y-d-m"), date("Y-d-m")]);
        if ($this->quantidadeRegistros($obj, ["fk_funcionario" => $fk_funcionario]) == 0) {
            if ($this->quantidadeRegistros($obj, ["email" => FuncoesReflections::pegaValorAtributoEspecifico($obj, "email")]) != 0) {
                echo FuncoesMensagens::geraJSONMensagem("Email já está cadastrado", "erro");
                return false;
            }
            if ($this->quantidadeRegistros($obj, ["login" => FuncoesReflections::pegaValorAtributoEspecifico($obj, "login")]) != 0) {
                echo FuncoesMensagens::geraJSONMensagem("Login já está cadastrado", "erro");
                return false;
            }

            if($this->create($obj)){
                echo FuncoesMensagens::geraJSONMensagem("Usuario cadastrado com sucesso!", "sucesso");
                return true;
            }else{
                echo FuncoesMensagens::geraJSONMensagem("Erro ao cadastrar o usuário", "erro");
                return false;
            }
        }
        echo FuncoesMensagens::geraJSONMensagem("Funcionário já relacionado com um usuário!", "erro");
        return false;
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
     *
     */
    public function pesquisarUsuario($obj1, $obj2, $condicoes = false)
    {
        return $this->innerJoin($obj1, $obj2, $condicoes, false);
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
            $linhaUsuario = $this->buscaPorCondicoes($obj, ["email" => $email, "senha" => $senha], true);
            echo $qntRegistros;
            if ($qntRegistros > 0) {
                if (!isset($_SESSION['session_usuario'])) session_start();
                $_SESSION['session_usuario'] = $linhaUsuario['pk_usuario'];
                $msg = FuncoesMensagens::geraMensagem("Usuário logado com sucesso", "sucesso");
                $this->redirecionar("../view/paginas/layout/?" . $msg);
                return true;
            } else {
                $msg = FuncoesMensagens::geraMensagem("Usuário e/ou senha não existem ou não se conhecidem.", "erro");
                $this->redirecionar("../view/paginas/login.php?" . $msg);
                return false;
            }
        } catch (Exception $e) {
            throw new Exception("Excessao capturada", 0, $e);
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

//$funcionario = new Funcionario();
//$usuario = new Usuario();
//$usuarioDAO = new UsuarioDAO();
//
//$usuarioDAO->innerJoin($usuario, $funcionario, ["pk_usuario" => "",
//    "nome" => "", "login" => "marciioluucas"]);


