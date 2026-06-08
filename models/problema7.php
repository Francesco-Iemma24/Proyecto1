<?php

require_once __DIR__ . '/../utils/Utilidades.php';

class Problema7
{
    public static function calcularEstadisticas(array $notas)
    {
        $cantidad = count($notas);
        $promedio = array_sum($notas) / $cantidad;

        return [
            'promedio'   => round($promedio, 2),
            'desviacion' => round(Utilidades::calcularDesviacion($notas), 2),
            'minima'     => min($notas),
            'maxima'     => max($notas)
        ];
    }
}