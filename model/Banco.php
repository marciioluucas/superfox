<?php
require_once 'ConfBD.php';
require_once '../util/FuncoesString.php';

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 18:50
 */
class Banco
{
    private $mysqli;


    function __construct()
    {
        $this->mysqli = new mysqli(ConfBD::$HOST, ConfBD::$USER, ConfBD::$PWD, ConfBD::$BASE);
        if ($this->mysqli->connect_errno) {
            echo "Erro na conexão com o banco de dados: " . $this->mysqli->connect_error;

        }
    }

    function executeQuery($query)
    {
        $query = FuncoesString::paraCaixaAlta($query);
        $this->mysqli->query($query);
        return $this->descobreAcaoBanco($query);
    }

    function descobreAcaoBanco($query) {
        if(FuncoesString::verificaStringExistente($query, "INSERT")) {
            return $this->mysqli->insert_id;
        }
        elseif(FuncoesString::verificaStringExistente($query, "UPDATE")){

        }
        elseif (FuncoesString::verificaStringExistente($query, "SELECT")){

        }
        return 'Comando nao tratado no metodo descobreAcaoBanco na classe Banco de dados';
    }
}