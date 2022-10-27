<?php 
if (!isset($_SESSION['felhasznalo'])) {
    http_response_code(403);
    include "views/_403.html";
    die();
}
include "views/pizza_feltet.php";