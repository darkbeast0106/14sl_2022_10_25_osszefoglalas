<?php 
function getNev($pizza_feltet)
{
    return $pizza_feltet['feltet_nev'];
}

require_once "models/PizzaModel.php";
require_once "models/PizzaAlapModel.php";
require_once "models/PizzaFelteteiModel.php";
require_once "models/PizzaFeltetModel.php";
$pizza_model = new PizzaModel();
$pizza_alap_model = new PizzaAlapModel();
$pizza_feltetei_model = new PizzaFelteteiModel();
$pizza_feltet_model = new PizzaFeltetModel();

$pizzak = $pizza_model->select_all();
foreach ($pizzak as $key => $pizza) {
    $pizza_alap = $pizza_alap_model->get_by_id($pizza['alap_id']);
    $feltetek = $pizza_feltetei_model->get_by_pizza_id($pizza['id']);
    foreach ($feltetek as $feltet_key => $feltet_kapcs) {
        $feltet = $pizza_feltet_model->get_by_id($feltet_kapcs['feltet_id']);
        $feltetek[$feltet_key]['feltet_nev'] = $feltet['nev'];
    }
    $pizzak[$key]['feltetek'] = array_map('getNev',$feltetek);
    $pizzak[$key]['alap'] = $pizza_alap['nev'];
}
include "views/pizza_list.php";