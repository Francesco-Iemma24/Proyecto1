<?php

require_once 'models/Problema9.php';

class Problema9Controller
{
    public function procesar($numero)
    {
        $modelo = new Problema9();

        return $modelo->generarPotencias($numero);
    }
}