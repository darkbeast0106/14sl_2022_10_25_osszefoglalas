<?php 
require_once "models/_adatbazis.php";
class PizzaModel extends Adatbazis {
    public function select_all()
    {
        $sql = "SELECT * FROM pizzak";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}