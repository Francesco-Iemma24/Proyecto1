<?php

require_once __DIR__ . '/../models/Problema2.php';

class Problema2Controller
{
    public static function procesar()
    {
        return Problema2::resolver();
    }
}