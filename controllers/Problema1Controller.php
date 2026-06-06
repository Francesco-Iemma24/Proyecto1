<?php

require_once __DIR__ . '/../models/Problema1.php';

class Problema1Controller
{
    public static function procesar(array $numeros)
    {
        return Problema1::resolver($numeros);
    }
}