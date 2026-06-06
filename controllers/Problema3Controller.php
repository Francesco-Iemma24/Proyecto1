<?php

require_once __DIR__ . '/../models/Problema3.php';

class Problema3Controller
{
    public static function procesar($n)
    {
        return Problema3::resolver($n);
    }
}