<?php

require_once __DIR__ . '/../config/Conexion.php';

// Instanciar y probar la conexión directamente
$conexion = new Conexion();
$conexion->conectar();