<?php

class Problema7Controller
{
    public function procesar($notas)
    {
        // 1. Validar que el arreglo no esté vacío para evitar divisiones por cero
        if (empty($notas) || !is_array($notas)) {
            return [
                'promedio' => 0,
                'desviacion' => 0,
                'minima' => 0,
                'maxima' => 0
            ];
        }

        // 2. Obtener la cantidad de notas
        $cantidad = count($notas);

        // 3. Calcular Promedio, Mínimo y Máximo usando funciones nativas de PHP
        $promedio = array_sum($notas) / $cantidad;
        $minima = min($notas);
        $maxima = max($notas);

        // 4. Calcular la Desviación Estándar (Poblacional)
        $sumaCuadrados = 0;
        foreach ($notas as $nota) {
            $sumaCuadrados += pow($nota - $promedio, 2);
        }
        $desviacion = sqrt($sumaCuadrados / $cantidad);

        // 5. Retornar los resultados redondeados a 2 decimales
        return [
            'promedio' => round($promedio, 2),
            'desviacion' => round($desviacion, 2),
            'minima' => $minima,
            'maxima' => $maxima
        ];
    }
}