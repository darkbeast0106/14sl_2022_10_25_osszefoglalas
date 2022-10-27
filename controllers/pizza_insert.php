<?php 
if (!isset($_SESSION['felhasznalo'])) {
    http_response_code(403);
    include "views/_403.html";
    die();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nev = isset($_POST['nev']) ? $_POST['nev'] : "";
    $leiras = isset($_POST['leiras']) ? $_POST['leiras'] : "";
    $alap_id = isset($_POST['alap_id']) ? $_POST['alap_id'] : "";
    $feltet = isset($_POST['feltet']) ? $_POST['feltet'] : [];
    $hiba = "";
    if (empty($nev)) {
        $hiba .= "Név megadása kötelező. ";
    }
    if (empty($alap_id)) {
        $hiba .= "Pizza alap kiválasztása kötelező. ";
    }
    if (empty($feltet)) {
        $hiba .= "Legalább egy feltét kiválasztása kötelező. ";
    }
    if ($hiba != "") {
        $hiba = trim($hiba);
        include "views/hiba_alert.php";
    } else {
        require_once "models/PizzaModel.php";
        require_once "models/PizzaFelteteiModel.php";
        $pizza_model = new PizzaModel();
        $pizza_feltetei_model = new PizzaFelteteiModel();
        try {
            var_dump($_POST);
            $pizza_id = $pizza_model->insert($nev, $leiras, $alap_id);
            foreach ($feltet as $feltet_id) {
                $pizza_feltetei_model->insert($pizza_id, $feltet_id);
            }
        } catch (\mysqli_sql_exception $th) {
            $hiba = $th->getMessage();
            include "views/hiba_alert.php";
        }
    }
}

require_once "models/PizzaAlapModel.php";
require_once "models/PizzaFeltetModel.php";
$pizza_alap_model = new PizzaAlapModel();
$pizza_feltet_model = new PizzaFeltetModel();

$pizza_alapok = $pizza_alap_model->list_all();
$pizza_feltetek = $pizza_feltet_model->list_all();

include 'views/pizza_insert.php';