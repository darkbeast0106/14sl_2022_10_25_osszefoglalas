<?php 
if (file_exists("../models/_adatbazis.php")) {
    require_once "../models/_adatbazis.php";
} else if (file_exists("models/_adatbazis.php")) {
    require_once "models/_adatbazis.php";
} else {
    die();
}
class PizzaAlapModel extends Adatbazis {
    public function list_all() 
    {
        $sql = "SELECT * FROM pizza_alapok";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($nev)
    {
        $sql = "INSERT INTO pizza_alapok(nev) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $nev);
        $stmt->execute();
    }

    public function get_by_id($id)
    {
        $sql = "SELECT * FROM pizza_alapok
            WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}