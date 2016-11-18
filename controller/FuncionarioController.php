<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/model/Funcionario.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/model/Cargo.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/dao/FuncionarioDAO.php");

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 25/10/2016
 * Time: 16:07
 */
class FuncionarioController
{

    public $funcionario;
    public $cargo;
    public $funcionarioDAO;

    public function __construct()
    {
        $this->funcionario = new Funcionario();
        $this->cargo = new Cargo();
        $this->funcionarioDAO = new FuncionarioDAO();

        $this->funcionario->setNome(isset($_POST['nome']) ? $_POST['nome'] : null);
        $this->funcionario->setCargo(isset($_POST['cargo']) ? $_POST['cargo'] : null);
        $this->funcionario->setCpf(isset($_POST['cpf']) ? $_POST['cpf'] : null);
        if (isset($_POST['action'])) {

            if ($_POST['action'] == "salvar") {
                try {
                    $this->salvar();
                } catch (Exception $e) {
                    echo FuncoesMensagens::geraJSONMensagem($e->getMessage(), "erro");
                }
            }
            if ($_POST['action'] == "alterar") {
                try {
                    $this->alterar();
                } catch (Exception $e) {
                    echo FuncoesMensagens::geraJSONMensagem($e->getMessage(), "erro");
                }
            }

            if ($_POST['action'] == "excluir") {
                try {
                    $this->excluir();
                } catch (Exception $e) {
                    echo FuncoesMensagens::geraJSONMensagem($e->getMessage(), "erro");
                }
            }
        }
    }

    public function salvar()
    {

    }

    public function alterar()
    {

    }

    public function excluir()
    {

    }

    public function porId($pk_funcionario)
    {
        $this->funcionario->setPk_Funcionario($pk_funcionario);
        return $this->funcionarioDAO->porIdFuncionario($this->funcionario);
    }

    public function pesquisarFuncionarioCPF()
    {
        return $this->funcionarioDAO->buscaPorCondicoes($this->funcionario, ["ativado" => 1]);
    }

    public function pesquisarFuncionario()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
        $cargo = isset($_GET['cargo']) ? $_GET['cargo'] : "";
        $cpf = isset($_GET['cpf']) ? $_GET['cpf'] : "";
        if ($id == "" && $nome == "" && $cargo == "" && $cpf == "") {
            return $this->funcionarioDAO->pesquisarFuncionario($this->funcionario, $this->cargo,
                ["funcionario.ativado" => 1], ["pk_funcionario","funcionario.nome as funcName", "cargo.nome as cargName", "cpf"]);
        } else {
            return $this->funcionarioDAO->pesquisarFuncionario($this->funcionario, $this->funcionario, ["pk_funcionario" => $id,
                "nome" => $nome, "cargo" => $cargo, "cpf" => $cpf, "funcionario.ativado" => 1],
                ["pk_funcionario", "funcionario.nome as funcName", "cargo.nome as cargName", "cpf"]);
        }
    }

    //Este método é usado no cadastro de usuário;
    public function montaJSONParaConsultaFuncionarioCPF()
    {
        $infos = $this->pesquisarFuncionarioCPF();
        $stringFinal = "";
        for ($i = 0; $i < count($infos); $i++) {
            if ($i != count($infos) - 1) {
                $stringFinal .= "\"" . $infos[$i]['nome'] . " | " . $infos[$i]['cpf'] . "\" : null,\n";
            } else {
                $stringFinal .= "    \"" . $infos[$i]['nome'] . " | " . $infos[$i]['cpf'] . "\" : null\n";
            }
        }

        echo $stringFinal;
    }


}

new FuncionarioController();