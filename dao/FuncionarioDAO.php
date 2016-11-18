<?php
require_once("DAO.php");
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 25/10/2016
 * Time: 14:39
 */
class FuncionarioDAO extends DAO
{
    /**
     * @param $obj
     * @return string
     */
    public function criarFuncionario($obj)
    {
        $fk_funcionario = FuncoesReflections::pegaValorAtributoEspecifico($obj, "fk_funcionario");
        if ($this->quantidadeRegistros($obj, ["fk_funcionario" => $fk_funcionario]) == 0) {
            $this->create($obj);
            return FuncoesMensagens::geraJSONMensagem("Funcionario cadastrado com sucesso!", "sucesso");
        }
        return FuncoesMensagens::geraJSONMensagem("Funcionario já existe", "erro");
    }


    /**
     * @param $obj
     * @return mixed
     */
    public function porIdFuncionario($obj)
    {
        return $this->porId($obj);
    }

    /**
     * @param $obj
     * @param $id
     */
    public function updateFuncionario($obj, $id)
    {
        if ($this->update($obj, $id)) {
            echo FuncoesMensagens::geraJSONMensagem("Funcionário alterado com sucesso!", "sucesso");
            return true;
        } else {
            echo FuncoesMensagens::geraJSONMensagem("Erro ao alterar Funcionário.", "erro");
            return false;
        }
    }

    /**
     * Apagar o usuário.
     * @param $obj
     * @param $id
     */
    public function deleteFuncionario($obj, $id)
    {
        if ($this->update($obj, $id)) {
            echo FuncoesMensagens::geraJSONMensagem("Funcionário deletado com sucesso!", "sucesso");
            return true;
        } else {
            echo FuncoesMensagens::geraJSONMensagem("Erro ao deletar Funcionário.", "erro");
            return false;
        }
    }

    /**
     * Aqui é o seguinte, voce pesquisa o funcionario fazendo innerjoin com outra tabela. Este método foi feito para
     * a pesquisa de funcionario na listagem do mesmo, mas para que as informações venham completas, precisamos fazer
     * a junção com a tabela de Cargo.
     * @param $obj1
     * @param $obj2
     * @param $condicoes
     *
     * @return array|bool|mixed
     */
    public function pesquisarFuncionario($obj1, $obj2, $condicoes = false, $campos = null)
    {
        return $this->innerJoin($obj1, $obj2, $condicoes, false, $campos);
    }



}