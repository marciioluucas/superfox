<?php
require_once "ConfBD.php";
require_once "../util/FuncoesString.php";
require_once "../util/FuncoesVariaveis.php";

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 19/10/2016
 * Time: 18:50
 */
class Banco
{
    /**
     * @var mysqli
     */
    private $mysqli;


    /**
     * Construtor da classe Banco .
     */
    function __construct()
    {
        $this->mysqli = new mysqli(ConfBD::$HOST, ConfBD::$USER, ConfBD::$PWD, ConfBD::$BASE);
        if ($this->mysqli->connect_errno) {
            echo "Erro na conexão com o banco de dados: " . $this->mysqli->connect_error;

        }
    }

    /**
     * @param $query
     * @param $campos
     * @return mixed|string
     */
    function executeQuery($query, $campos)
    {
        //Lembrete: Se caso der erro, pode ser que a query do banco de dados MySQL esteja case-sensitive.
        //Todas tabelas estão no padrão de nomes minusculos.
        if ($query == null || $query == "") {
            echo "Query não informada";
        }

        if ($campos == null || empty($campos)) {
            echo "Campos não informados";
        }

        //Deve retornar a primeira letra do tipo do valor na posição de cada campo.
        $tipos = "";
        for ($i = 0; $i < count($campos); $i++) {
            $campos[$i] = substr($campos[$i], 0);
            $campos[$i] = strtolower($campos[$i]);
            $tipos .= FuncoesVariaveis::retornaTipoVariavel($campos[$i]);
        }

        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param($tipos, $campos);
        $query = FuncoesString::paraCaixaAlta($query);
        $this->mysqli->query($query);
        return $this->descobreAcaoBanco($query);
    }

    /**
     * @param $query
     * @return mixed|string
     */
    function descobreAcaoBanco($query)
    {
        if (FuncoesString::verificaStringExistente($query, "INSERT")) {
            return $this->mysqli->insert_id;
        } elseif (FuncoesString::verificaStringExistente($query, "UPDATE")) {

        } elseif (FuncoesString::verificaStringExistente($query, "SELECT")) {

        }
        return "Comando não tratado no método descobreAcaoBanco na classe Banco de dados";
    }
}