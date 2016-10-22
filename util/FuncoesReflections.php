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
            return strtolower(substr($aux, 3));
        }, $metodosGet);

        $nomeAtributos = array_values($nomeAtributos);
        $nomesFinal = [];

        for ($i = 0; $i < count($nomeAtributos); $i++) {
            if (property_exists(FuncoesReflections::pegaNomeClasseObjeto($obj), $nomeAtributos[$i])) {
                $nomesFinal[$i] = $nomeAtributos[$i];
            }
        }

        $nomesFinal = array_values($nomesFinal);

        return $nomesFinal;
    }

    public static function pegaValoresAtributoDoObjeto($obj)
    {
        $nomeAtributos = self::pegaAtributosDoObjeto($obj);
        $valoresAtributosFinal = [];
        for ($i = 0; $i < count($nomeAtributos); $i++) {
            $reflectionClass = new ReflectionClass(self::pegaNomeClasseObjeto($obj));
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

}