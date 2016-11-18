<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/superfox/controller/CargoController.php");
$cargoController = new CargoController();
echo($cargoController->retornaJsonPesquisaCargo());
?>