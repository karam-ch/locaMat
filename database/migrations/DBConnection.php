<?php

class Database
{
    private $host = "localhost";
    private $db_name = "locamat";
    private $username = "root";
    private $password = "root";
    private $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . "locamat=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->conn;
    }

    public function disconnect()
    {
        $this->conn = null;
    }
}
