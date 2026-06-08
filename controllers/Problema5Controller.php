<?php

require_once __DIR__ . '/../models/Problema5.php';

class Problema5Controller
{
    public static function resolver($edades)
    {
        return Problema5::clasificarEdades($edades);
    }
}