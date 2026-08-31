<?php

class Conexion {
    
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function __construct() {
        $envPath = __DIR__ . '/../.env';
        
        
        $this->host = 'localhost';
        $this->db_name = 'persona';
        $this->username = 'root';
        $this->password = '';

        if (file_exists($envPath)) {
            $env = parse_ini_file($envPath);
            if ($env !== false) {
                $this->host = $env['DB_HOST'] ?? $this->host;
                $this->db_name = $env['DB_NAME'] ?? $this->db_name;
                $this->username = $env['DB_USER'] ?? $this->username;
                $this->password = $env['DB_PASS'] ?? $this->password;
            }
        }
    }

    
    public function conectar() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch(PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
            exit();
        }

        return $this->conn;
    }
}