<?php 
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
} else if ($_SERVER['REQUEST_METHOD'] == "GET") {
    require "../models/PizzaFeltetModel.php";
    $model = new PizzaFeltetModel();
    $feltetek = $model->list_all();
    echo json_encode($feltetek, JSON_UNESCAPED_UNICODE);
} else if($_SERVER['REQUEST_METHOD'] == "POST") {
    require "../models/PizzaFeltetModel.php";
    $model = new PizzaFeltetModel();
    $json = file_get_contents("php://input");
    $post = json_decode($json, true);
    $hiba = "";
    if (!isset($post['nev']) || empty($post['nev'])) {
        $hiba = "Feltét nevét meg kell adni.";
        http_response_code(422);
    } else {
        $nev = $post['nev'];
        try {
            $model->insert($nev);
        } catch (\mysqli_sql_exception $th) {
            if ($th->getCode() == 1062) {
                http_response_code(409);
                $hiba = "Ilyen nevű feltét már van";
            } else {
                $hiba = "Ismeretlen hiba történt";
                http_response_code(500);
            }
        }
    }
    if ($hiba != "") {
        echo json_encode(["message" => $hiba], JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(["message" => "Sikeres felvétel"], JSON_UNESCAPED_UNICODE);
        http_response_code(201);
    }
} else {
    http_response_code(405);
}