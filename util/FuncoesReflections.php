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
     * @param $obj
     * @return string
     */
    public static function pegaNomeClasseObjeto($obj)
    {
        return get_class($obj);
    }

    /**
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

    public static function pegaValorAtributoEspecifico($obj, $nomeAtributo)
    {
        $nomeAtributos = $nomeAtributo;
        $reflectionClass = new ReflectionClass(self::pegaNomeClasseObjeto($obj));
        $reflectionProperty = $reflectionClass->getProperty($nomeAtributos);
        $reflectionProperty->setAccessible(true);
        $valoresAtributosFinal = $reflectionProperty->getValue($obj);
        return $valoresAtributosFinal;
    }
    public static function injetaValorAtributo($obj,$valor){
        $nomeAtributos = self::pegaAtributosDoObjeto($obj);

        for($i = 0; $i < count($nomeAtributos); $i++){
            $reflectionMethod = new ReflectionMethod($obj, "set");
            echo $reflectionMethod->invoke($obj, $valor);
        }
    }

}