<?php

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 21/10/2016
 * Time: 10:03
 */
class FuncoesReflections
{
    /**
     * Passa o objeto e a função irá retornar o nome da classe do respectivo objeto.
     * @param $obj
     * @return string
     */
    public static function pegaNomeClasseObjeto($obj)
    {
        return get_class($obj);
    }

    /**
     * Passa o objeto e a função vai retornar todos os atributos do objeto baseado
     * nos métodos get.
     * @param $obj
     * @return array
     */
    public static function pegaAtributosDoObjeto($obj)
    {
        $metodos = FuncoesReflections::pegaNomesMetodosClasse($obj);

        $metodosGet = array_filter($metodos, function ($au) {
            return FuncoesString::verificaStringExistente($au, "get");
        });

        $nomeAtributos = array_map(function ($aux) {
            return substr(strtolower($aux), 3);
        }, $metodosGet);


        $nomeAtributos = array_values($nomeAtributos);
        $nomesFinal = [];


        $reflectionClass = new ReflectionClass(self::pegaNomeClasseObjeto($obj));
        for ($i = 0; $i < count($nomeAtributos); $i++) {
            $reflectionProperty = $reflectionClass->getProperty($nomeAtributos[$i]);
            $reflectionProperty->setAccessible(true);
            if ($reflectionClass->hasProperty($nomeAtributos[$i])) {
                $nomesFinal[$i] = $reflectionProperty->getName();
            }
        }

        $nomesFinal = array_values($nomesFinal);
        return $nomesFinal;
    }

    /**
     * Passe só o objeto e a função retorna um array de todos os valores dos atributos de um objeto
     * @param $obj
     * @return array
     */
    public static function pegaValoresAtributoDoObjeto($obj)
    {
        $nomeAtributos = self::pegaAtributosDoObjeto($obj);
        $valoresAtributosFinal = [];
        $reflectionClass = new ReflectionClass(self::pegaNomeClasseObjeto($obj));
        for ($i = 0; $i < count($nomeAtributos); $i++) {
            $reflectionProperty = $reflectionClass->getProperty($nomeAtributos[$i]);
            $reflectionProperty->setAccessible(true);
            $valoresAtributosFinal[$i] = $reflectionProperty->getValue($obj);
        }
        return $valoresAtributosFinal;
    }

    /**
     * @param $obj
     * @return array
     */
    public static function pegaNomesMetodosClasse($obj)
    {
        $aux = get_class_methods($obj);
        return $aux;
    }

    /**
     * Passa o objeto e o nome do atributo que voce quer pegar. Se o mesmo não existir, a função retornará falso.
     * @param $obj
     * @param $nomeAtributo
     * @return bool|string
     * @throws Exception
     */
    public static function pegaNomeAtributoEspecifico($obj, $nomeAtributo)
    {
        try {
            $arrayAtributosObjeto = self::pegaAtributosDoObjeto($obj);
            for ($i = 0; $i < count($arrayAtributosObjeto); $i++) {
                $atributoEspecifico = strstr($arrayAtributosObjeto[$i], $nomeAtributo);
                return $atributoEspecifico;
            }
        } catch (Exception $e) {
            throw new Exception("Falha ao pegar nome do atributo específico", 3, $e);
        }
        return false;
    }

    /**
     * Passa o objeto e tambem o nome do atributo que voce quer pegar o valor.
     * @param $obj
     * @param $nomeAtributo
     * @return mixed
     */
    public static function pegaValorAtributoEspecifico($obj, $nomeAtributo)
    {
        $nomeAtributos = $nomeAtributo;
        $reflectionClass = new ReflectionClass(self::pegaNomeClasseObjeto($obj));
        $reflectionProperty = $reflectionClass->getProperty($nomeAtributos);
        $reflectionProperty->setAccessible(true);
        $valoresAtributosFinal = $reflectionProperty->getValue($obj);
        return $valoresAtributosFinal;
    }

    /**
     * Passa o objeto, os atributos e os valores que você quer injetar, se caso queira injetar valores
     * em todos atributos do objeto, você deixa o 2nd parametro vazio.
     * @param $obj
     * @param array $atributos
     * @param array $valor
     */
    public static function injetaValorAtributo($obj, $atributos = [], $valor = [])
    {
        $nomeAtributos = self::pegaAtributosDoObjeto($obj);
        if (count($atributos) >= 0) {
            for ($i = 0; $i < count($atributos); $i++) {
                $reflectionMethod = new ReflectionMethod($obj, "set" . ucfirst($atributos[$i]));
                $reflectionMethod->invoke($obj, $valor);
            }
        }else{
            for ($i = 0; $i < count($nomeAtributos); $i++) {
                $reflectionMethod = new ReflectionMethod($obj, "set" . ucfirst($nomeAtributos[$i]));
                $reflectionMethod->invoke($obj, self::pegaValoresAtributoDoObjeto($obj));
            }
        }

    }

}