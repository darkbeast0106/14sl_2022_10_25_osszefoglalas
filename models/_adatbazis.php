<?php 
class Adatbazis {
    protected $conn;
    
    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "pizzazo");
    }
}