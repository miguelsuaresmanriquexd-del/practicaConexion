<?php

require_once __DIR__ . '/../models/Persona.php';

class PersonaController
{

    public function index()
    {
        // Instancia de la clase Persona
        $personaModel = new Persona();

        // Obtener la lista de personas
        $personas = $personaModel->listaPersonas();

        


        
        require_once __DIR__ . '/../views/index.php';
    }
}