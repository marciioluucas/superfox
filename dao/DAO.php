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
        $this->conn = Banco::getConnection();
    }

    protected function fecharConexao()
    {

    }

    /**
     * @param $obj
     * @return mixed
     * @throws Exception
     */
    public function create($obj)
    {
        try {
            $tabela = FuncoesString::paraCaixaBaixa(FuncoesReflections::pegaNomeClasseObjeto($obj));
            $camposNome = FuncoesReflections::pegaAtributosDoObjeto($obj);
            $camposValores = FuncoesReflections::pegaValoresAtributoDoObjeto($obj);
            $sqlInsert = "INSERT INTO $tabela (";

            for ($i = 0; $i < count($camposNome); $i++) {
                if ($i != count($camposNome) - 1) {
                    $sqlInsert .= $camposNome[$i] . ", ";
                } else {
                    $sqlInsert .= $camposNome[$i] . ") VALUES (";
                }
            }

            for ($j = 0; $j < count($camposNome); $j++) {
                if ($j != count($camposNome) - 1) {
                    $sqlInsert .= ":" . $camposNome[$j] . ", ";
                } else {
                    $sqlInsert .= ":" . $camposNome[$j] . ")";
                }
            }
            $pdo = Banco::getConnection()->prepare($sqlInsert);
            for ($i = 0; $i < count($camposNome); $i++) {
                $pdo->bindValue($camposNome[$i], $camposValores[$i]);
            }

            return $pdo->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao processar query", $e);
        }
    }


    /**
     * @param $id
     * @return mixed
     */
    public function porId($obj, $id)
    {
        try {

        } catch (Exception $e) {
            throw new Exception("Erro ao processar query: ", $e);
        }
        $tabela = FuncoesString::paraCaixaBaixa(FuncoesReflections::pegaNomeClasseObjeto($obj));
        $camposNome = FuncoesReflections::pegaAtributosDoObjeto($obj);
        $sqlSelect = "SELECT * $tabela WHERE pk_" . $tabela . " = " . $id;

        $pdo = Banco::getConnection()->prepare($sqlSelect);
        return $pdo->execute();
    }

    /**
     * @param $obj
     * @return mixed
     * @throws Exception
     */
    public function update($obj, $id)
    {
        try {
            $tabela = FuncoesString::paraCaixaBaixa(FuncoesReflections::pegaNomeClasseObjeto($obj));
            $camposNome = FuncoesReflections::pegaAtributosDoObjeto($obj);
            $camposValores = FuncoesReflections::pegaValoresAtributoDoObjeto($obj);
            $sqlUpdate = "UPDATE $tabela SET ";

            for ($i = 0; $i < count($camposNome); $i++) {
                if ($i != count($camposNome) - 1) {
                    $sqlUpdate .= $camposNome[$i] . " = :" . $camposNome[$i] . ", ";
                } else {
                    $sqlUpdate .= $camposNome[$i] . " WHERE pk_" . $tabela . " = " . $id;
                }
            }
            $pdo = Banco::getConnection()->prepare($sqlUpdate);
            for ($i = 0; $i < count($camposNome); $i++) {
                $pdo->bindValue($camposNome[$i], $camposValores[$i]);
            }

            print_r($sqlUpdate);
            return $pdo->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao processar query", $e);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    abstract public function delete($id);


}