<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/model/Funcionario.php");
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
    public $funcionarioDAO;

    public function __construct()
    {
        $this->funcionario = new Funcionario();
        $this->funcionarioDAO = new FuncionarioDAO();

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

    //Este método é usado no cadastro de usuario;
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