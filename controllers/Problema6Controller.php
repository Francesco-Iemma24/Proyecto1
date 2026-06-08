<?php

require_once __DIR__ . '/../models/Problema6.php';

class Problema6Controller
{
    public static function resolver($presupuesto)
    {
        return Problema6::calcularPresupuesto($presupuesto);
    }
}