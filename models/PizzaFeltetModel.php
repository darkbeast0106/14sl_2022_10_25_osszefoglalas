<?php 
if (file_exists("../models/_adatbazis.php")) {
    require_once "../models/_adatbazis.php";
} else if (file_exists("models/_adatbazis.php")) {
    require_once "models/_adatbazis.php";
} else {
    die();
}
class PizzaFeltetModel extends Adatbazis {
    public function list_all() 
    {
        $sql = "SELECT * FROM feltetek";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($nev)
    {
        $sql = "INSERT INTO feltetek(nev) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $nev);
        $stmt->execute();
    }
}