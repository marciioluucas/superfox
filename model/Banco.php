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
    public static $instancia;


    /**
     * Construtor da classe Banco .
     */
    function __construct()
    {
    }


    public static function getConnection()
    {
        try {
            if (!isset(self::$instancia)) {
                self::$instancia = new PDO(ConfBD::$LINK, ConfBD::$USER, ConfBD::$PWD,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            }
            return self::$instancia;
        } catch (Exception $e) {
            throw new Exception("Erro ao conectar no banco", 0, $e);
        }
    }


    /**
     * @param $query
     * @param $valores
     * @return mixed|string
     */
    function executeQuery($query, $valores)
    {
        //Lembrete: Se caso der erro, pode ser que a query do banco de dados MySQL esteja case-sensitive.
        //Todas tabelas estão no padrão de nomes minusculos.
        if ($query == null || $query == "") {
            echo "Query não informada";
        }

        if ($valores == null || empty($valores)) {
            echo "Campos não informados";
        }

        //Deve retornar a primeira letra do tipo do valor na posição de cada campo.
        $tipos = "";
        for ($i = 0; $i < count($valores); $i++) {
            $valores[$i] = strtolower($valores[$i]);
            $tipos .= FuncoesVariaveis::retornaTipoVariavel(substr($valores[$i], 0));
        }

        //insert into usuario (nome, email, senha) values (?,?,?)

        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param($tipos, $valores);
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