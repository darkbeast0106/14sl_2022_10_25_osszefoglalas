<?php 
require_once "models/_adatbazis.php";
class PizzaModel extends Adatbazis {
    public function select_all()
    {
        $sql = "SELECT * FROM pizzak";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($nev, $leiras, $alap_id)
    {
        $sql = "INSERT INTO pizzak(nev, leiras, alap_id) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $nev, $leiras, $alap_id);
        $stmt->execute();
        return $stmt->insert_id;
    }
}