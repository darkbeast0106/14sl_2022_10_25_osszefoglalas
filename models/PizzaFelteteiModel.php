<?php 
if (file_exists("../models/_adatbazis.php")) {
    require_once "../models/_adatbazis.php";
} else if (file_exists("models/_adatbazis.php")) {
    require_once "models/_adatbazis.php";
} else {
    die();
}
class PizzaFelteteiModel extends Adatbazis {
    public function list_all() 
    {
        $sql = "SELECT * FROM pizza_feltetei";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($pizza_id, $feltet_id)
    {
        $sql = "INSERT INTO pizza_feltetei(pizza_id, feltet_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $pizza_id, $feltet_id);
        $stmt->execute();
    }
}