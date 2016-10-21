<?php

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 20/10/2016
 * Time: 22:14
 */
abstract class DAO
{
    protected $conn;

    protected function abrirConexao()
    {
        $this->conn = Banco::getConnection();
    }

    abstract public function create($obj);

    abstract public function porId($id);

    abstract public function update($obj);

    abstract public function delete($id);


}