<?php 
require_once "models/PizzaModel.php";
$pizza_model = new PizzaModel();
$pizzak = $pizza_model->select_all();
// TODO - pizza alap és feltétek hozzáadása a lekérdezéshez.
include "views/pizza_list.php";