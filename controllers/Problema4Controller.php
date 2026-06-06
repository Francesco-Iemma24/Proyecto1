<?php

require_once __DIR__ . '/../models/Problema4.php';

class Problema4Controller
{
    public static function procesar()
    {
        return Problema4::resolver();
    }
}