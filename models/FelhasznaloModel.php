<?php 
require_once "models/_adatbazis.php";
class FelhasznaloModel extends Adatbazis {
    public function regisztracio($felhasznalonev, $email, $jelszo)
    {
        $sql = "INSERT INTO felhasznalok(felhasznalonev, email, password)
        VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $hash = password_hash($jelszo, PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $felhasznalonev, $email, $hash);
        $stmt->execute();
    }

    public function bejelentkezes($felhasznalonev, $jelszo)
    {
        $sql = "SELECT * FROM felhasznalok
            WHERE felhasznalonev = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $felhasznalonev);
        $stmt->execute();
        $result = $stmt->get_result();

        $felhasznalo = false;

        if ($result->num_rows == 1) {
            $sor = $result->fetch_assoc();
            if (password_verify($jelszo, $sor['password'])) {
               $felhasznalo = $sor;
            }
        }
        
        return $felhasznalo;
    }
}