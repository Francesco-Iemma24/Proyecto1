<?php

require_once __DIR__ . '/../utils/Utilidades.php';

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