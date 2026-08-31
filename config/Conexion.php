<?php

class Conexion {
    private $conn;

    public function conectar() {
        $this->conn = null;

        $envPath = __DIR__ . '/../.env';
        
        
        $host = 'localhost';
        $db_name = 'persona';
        $username = 'root';
        $password = '';

        if (file_exists($envPath)) {
            $env = parse_ini_file($envPath);
            if ($env !== false) {
                $host = $env['DB_HOST'] ?? $host;
                $db_name = $env['DB_NAME'] ?? $db_name;
                $username = $env['DB_USER'] ?? $username;
                $password = $env['DB_PASS'] ?? $password;
            }
        }

        try {
            $this->conn = new PDO(
                "mysql:host=" . $host . ";dbname=" . $db_name,
                $username,
                $password
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