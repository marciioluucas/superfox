<?php
require_once '../model/Banco.php';
require_once '../util/FuncoesReflections.php';
require_once '../util/FuncoesString.php';

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 20/10/2016
 * Time: 22:14
 */
abstract class DAO
{
    /**
     * @var
     */
    protected $conn;

    /**
     *
     */
    protected function abrirConexao()
    {
//        $this->conn = Banco::getConnection();
    }

    /**
     * @param $obj
     * @return mixed
     */
    public function create($obj)
    {
        $tabela = FuncoesString::paraCaixaBaixa(FuncoesReflections::nomeClasseObjeto($obj));
        $camposNome = FuncoesReflections::getNomesCamposClasse($obj);
        $sqlInsert = "INSERT INTO $tabela (";
        for ($i = 0; $i < count($camposNome); $i++) {
            if ($i != count($camposNome)) {
                $sqlInsert .= $camposNome[$i] . ", ";
            } else {
                $sqlInsert .= $camposNome[$i] . ") VALUES (";
            }
        }
        print_r($sqlInsert);
    }


    /**
     * @param $id
     * @return mixed
     */
    abstract public function porId($id);

    /**
     * @param $obj
     * @return mixed
     */
    abstract public function update($obj);

    /**
     * @param $id
     * @return mixed
     */
    abstract public function delete($id);


}