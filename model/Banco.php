<?php
require_once("ConfBD.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/util/FuncoesString.php");
require_once($_SERVER['DOCUMENT_ROOT']."/superfox/util/FuncoesVariaveis.php");

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
}