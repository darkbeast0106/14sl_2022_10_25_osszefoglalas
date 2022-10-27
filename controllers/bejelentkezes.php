<?php 
if (isset($_SESSION['felhasznalo'])) {
    header("Location: /");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $felhasznalonev = $_POST['felhasznalonev'];
    $jelszo = $_POST['jelszo'];
    require_once "models/FelhasznaloModel.php";
    $model = new FelhasznaloModel();
    $felhasznalo = $model->bejelentkezes($felhasznalonev, $jelszo);
    if ($felhasznalo) {
        unset($felhasznalo['password']);
        $_SESSION['felhasznalo'] = $felhasznalo;
        header("Location: /");
    } else {
        $hiba = "Hibás felhasználónév vagy jelszó";
        include "views/hiba_alert.php";
    }
}

include "views/bejelentkezes_urlap.php";