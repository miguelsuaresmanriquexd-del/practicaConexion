<?php

require_once __DIR__ . '/../../config/Conexion.php';

class Persona {
    
    public $conexion;
    public $tabla = "persona";

    public $id;
    public $nombre;
    public $edad;
    public $correo;

    
    public function __construct($id = null, $nombre = null, $edad = null, $correo = null) {
        $database = new Conexion();
        $this->conexion = $database->conectar();

        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->correo = $correo;
    }

    
    public function listaPersonas() {
        $sql = "SELECT * FROM " . $this->tabla;
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}