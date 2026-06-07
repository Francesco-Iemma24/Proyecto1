<?php

class Problema7Controller
{
    public function calcular($notas)
    {
        $cantidad = count($notas);

        $promedio = array_sum($notas) / $cantidad;

        $minima = min($notas);
        $maxima = max($notas);

        $sumaCuadrados = 0;

        foreach ($notas as $nota) {
            $sumaCuadrados += pow($nota - $promedio, 2);
        }

        $desviacion = sqrt($sumaCuadrados / $cantidad);

        return [
            'promedio' => round($promedio, 2),
            'desviacion' => round($desviacion, 2),
            'minima' => $minima,
            'maxima' => $maxima
        ];
    }
}