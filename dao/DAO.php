<?php
require_once("D:/xampp/htdocs/superfox/model/Banco.php");
require_once("D:/xampp/htdocs/superfox/util/FuncoesReflections.php");
require_once("D:/xampp/htdocs/superfox/util/FuncoesString.php");

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 20/10/2016
 * Time: 22:14
 */
abstract class DAO
{

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
     * @param $obj
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function porId($obj)
    {
        try {
            $tabela = FuncoesString::paraCaixaBaixa(FuncoesReflections::pegaNomeClasseObjeto($obj));
            $sqlSelect = "SELECT * from $tabela WHERE pk_" . $tabela . " = " . FuncoesReflections::pegaValorAtributoEspecifico($obj, "pk_$tabela");
            $pdo = Banco::getConnection()->prepare($sqlSelect);
            $pdo->execute();
            return $pdo->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Erro ao processar query: ", 2, $e);
        }

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
                    $sqlUpdate .= $camposNome[$i] . " = :" . $camposNome[$i] . " WHERE pk_" . $tabela . " = " . $id;
                }
            }
            $pdo = Banco::getConnection()->prepare($sqlUpdate);
            for ($i = 0; $i < count($camposNome); $i++) {
                $pdo->bindValue($camposNome[$i], $camposValores[$i]);
            }

//            print_r($sqlUpdate);
            return $pdo->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao processar query", $e);
        }
    }

    /**
     * @param $obj
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function delete($obj, $id)
    {
        try {
            $tabela = FuncoesString::paraCaixaBaixa(FuncoesReflections::pegaNomeClasseObjeto($obj));
            $sqlUpdate = "DELETE FROM $tabela WHERE pk_" . $tabela . " = :pk_" . $tabela;
            $pdo = Banco::getConnection()->prepare($sqlUpdate);
            $pdo->bindValue("pk_" . $tabela, $id);
//            print_r($sqlUpdate);
            return $pdo->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao processar query", $e);
        }
    }

    /**
     * @param $obj
     * @param $condicoes
     * @return string
     */
    public function quantidadeRegistros($obj, $condicoes)
    {
        $tabela = FuncoesString::paraCaixaBaixa(FuncoesReflections::pegaNomeClasseObjeto($obj));
        $nomeCampos = [];
        $condicoesComIndexInt = array_keys($condicoes);
        for ($i = 0; $i < count($condicoes); $i++) {
            $nomeCampos[$i] = $condicoesComIndexInt[$i];
        }
        $valoresCampos = [];
        for ($j = 0; $j < count($condicoes); $j++) {
            $valoresCampos[$j] = $condicoes[$nomeCampos[$j]];
        }
        $sql = "SELECT * FROM $tabela WHERE ";

        for ($x = 0; $x < count($nomeCampos); $x++) {
            if ($x != count($nomeCampos) - 1) {
                $sql .= $nomeCampos[$x] . " = :" . $nomeCampos[$x] . " and ";
            } else {
                $sql .= $nomeCampos[$x] . " = :" . $nomeCampos[$x];
            }
        }
        $pdo = Banco::getConnection()->prepare($sql);
        for ($i = 0; $i < count($nomeCampos); $i++) {
            $pdo->bindValue($nomeCampos[$i], $valoresCampos[$i]);
        }
        $pdo->execute();
        return $pdo->rowCount();
    }

    public function buscaPorCondicoes($obj, $condicoes)
    {
        $tabela = FuncoesString::paraCaixaBaixa(FuncoesReflections::pegaNomeClasseObjeto($obj));
        $nomeCampos = [];
        $condicoesComIndexInt = array_keys($condicoes);
        for ($i = 0; $i < count($condicoes); $i++) {
            $nomeCampos[$i] = $condicoesComIndexInt[$i];
        }
        $valoresCampos = [];
        for ($j = 0; $j < count($condicoes); $j++) {
            $valoresCampos[$j] = $condicoes[$nomeCampos[$j]];
        }
        $sql = "SELECT * FROM $tabela WHERE ";

        for ($x = 0; $x < count($nomeCampos); $x++) {
            if ($x != count($nomeCampos) - 1) {
                $sql .= $nomeCampos[$x] . " = :" . $nomeCampos[$x] . " and ";
            } else {
                $sql .= $nomeCampos[$x] . " = :" . $nomeCampos[$x] . "";
            }
        }
        $pdo = Banco::getConnection()->prepare($sql);
        for ($i = 0; $i < count($nomeCampos); $i++) {
//            echo $nomeCampos[$i] . " | " . $valoresCampos[$i];
            $pdo->bindValue($nomeCampos[$i], $valoresCampos[$i]);
        }
        $pdo->execute();
        return $pdo->fetch(PDO::FETCH_ASSOC);
    }

    public function innerJoin($obj1, $obj2, $retornaSoPrimeiro = false)
    {
        $tabela1 = FuncoesString::paraCaixaBaixa(FuncoesReflections::pegaNomeClasseObjeto($obj1));
        $tabela2 = FuncoesString::paraCaixaBaixa(FuncoesReflections::pegaNomeClasseObjeto($obj2));
        $sql = "SELECT * FROM $tabela1 INNER JOIN $tabela2 on `$tabela1`.`fk_$tabela2` = `$tabela2`.`pk_$tabela2` where `$tabela1`.`pk_$tabela1` = :pk_$tabela1;";
//              SELECT * FROM $tabela1 INNER JOIN $tabela2 on `$tabela1`.`fk_$tabela2` = `$tabela2`.`pk_$tabela2` where `$tabela1`.`pk_$tabela1` = :pk_$tabela1;
        $pdo = Banco::getConnection()->prepare($sql);
        $pdo->bindValue("pk_$tabela1", FuncoesReflections::pegaValorAtributoEspecifico($obj1, "pk_$tabela1"));
        $pdo->execute();
        if (!$retornaSoPrimeiro) {
            return $pdo->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return $pdo->fetch(PDO::FETCH_ASSOC);
        }
    }
}