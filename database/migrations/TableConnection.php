<?php

class Database
{
    private $host = "localhost";
    private $db_name = "nom_de_votre_base_de_donnees";
    private $username = "votre_utilisateur";
    private $password = "votre_mot_de_passe";
    private $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
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
