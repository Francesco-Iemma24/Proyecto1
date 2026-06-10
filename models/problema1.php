<?php

namespace App\Models;

use App\Utils\Utilidades;

class Problema1
{
    public static function resolver(array $numeros)
    {
        return [
            'media' => Utilidades::calcularMedia($numeros),
            'desviacion' => Utilidades::calcularDesviacion($numeros),
            'minimo' => min($numeros),
            'maximo' => max($numeros)
        ];
    }
}