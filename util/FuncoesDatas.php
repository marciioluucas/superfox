<?php

/**
 * Created by PhpStorm.
 * User: Marcio
 * Date: 13/11/2016
 * Time: 12:04
 */
class FuncoesDatas
{
    public static final function converterDataParaBrasileira($data) {
        return date('d-m-Y', strtotime($data));
    }


}