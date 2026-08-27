<?php

require_once __DIR__ . '/../app/controllers/PersonaController.php';

// Instanciar controlador y ejecutar la acción
$controller = new PersonaController();
$controller->index();