<?php

require_once __DIR__ . '/../models/Persona.php';

class PersonaController {

    public function index() {
        $personaModel = new Persona();
        $personas = $personaModel->listaPersonas();

        
        print_r($personas);
    }
}