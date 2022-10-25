<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") {   
    require_once "models/FelhasznaloModel.php";
    $felh_model = new FelhasznaloModel();
    $felhasznalonev = $_POST['felhasznalonev'];
    $email = $_POST['email'];
    $jelszo = $_POST['jelszo'];
    $felh_model->regisztracio($felhasznalonev, $email, $jelszo);
}

include "views/regisztracio_urlap.php";