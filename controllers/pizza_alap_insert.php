<?php 
if (!isset($_SESSION['felhasznalo'])) {
    http_response_code(403);
    include "views/_403.html";
    die();
}
require_once "models/PizzaAlapModel.php";
$pizza_alap_model = new PizzaAlapModel();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nev = isset($_POST['nev']) ? $_POST['nev'] : "";
    
    $hiba = "";
    if (empty($nev)) {
        $hiba .= "Név megadása kötelező. ";
    }
    
    if ($hiba != "") {
        $hiba = trim($hiba);
        include "views/hiba_alert.php";
    } else {
        try {
            $pizza_alap_model->insert($nev);
        } catch (\mysqli_sql_exception $th) {
            if ($th->getCode() == 1062) {
                http_response_code(409);
                $hiba = "Ilyen nevű pizza alap már van";
            } else {
                $hiba = "Ismeretlen hiba történt";
                http_response_code(500);
            }
            include "views/hiba_alert.php";
        }

    }
}

$pizza_alapok = $pizza_alap_model->list_all();
include "views/pizza_alap.php";