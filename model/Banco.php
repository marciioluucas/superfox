<?php
require_once 'ConfBD.php';
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

    }

    function conexao() {
        $this->mysqli = new mysqli(ConfBD::$HOST, ConfBD::$USER, ConfBD::$PWD, ConfBD::$BASE);
        if ($this->mysqli->connect_errno) {
            echo "Erro na conexão com o banco de dados: " . $this->mysqli->connect_error;
        }
    }

    function montarQuery() {

    }
}