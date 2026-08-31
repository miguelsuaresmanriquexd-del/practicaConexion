<?php

require_once __DIR__ . '/../../config/Conexion.php';

class Persona {
    private $conexion;
    private $tabla = "persona";

    
    private $id;
    private $nombre;
    private $edad;
    private $correo;

    // Método Constructor
    public function __construct($id = null, $nombre = null, $edad = null, $correo = null) {
        $database = new Conexion();
        $this->conexion = $database->conectar();

        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->correo = $correo;
    }

    
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getEdad() { return $this->edad; }
    public function setEdad($edad) { $this->edad = $edad; }

    public function getCorreo() { return $this->correo; }
    public function setCorreo($correo) { $this->correo = $correo; }

    
    public function listaPersonas() {
        $sql = "SELECT * FROM " . $this->tabla;
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}