<?php
namespace OHS\NF\Controller;

use OHS\NF\Controller\ViewController;
use OHS\NF\Controller\ItemController;
use OHS\NF\Controller\ClientController;

class ReportController 
{
    public static function getItens()
    {
        $itens = array();

        foreach ($_SESSION["relatorio"] as $key => $value) {
            if ($value["tipo"] == "produto") {
                array_push($itens, ItemController::infoDbArray($value["nI"], NULL, NULL, NULL, NULL, NULL));
            }
        }

        return $itens;
    }

    public static function getOficinas()
    {       
       $oficinas = array();

        foreach ($_SESSION["relatorio"] as $key => $value) {
            if ($value['tipo'] == "oficina") {
                array_push($oficinas, ClientController::infoDbArray($value["nC"], NULL));
            }

        }

        return $oficinas;
    }

    public static function getDono()
    {
        
    }

}

?>