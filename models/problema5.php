<?php

class Problema5
{
    public static function clasificarEdades($edades)
    {
        $estadisticas = [
            'ninos' => 0,
            'adolescentes' => 0,
            'adultos' => 0,
            'adultosMayores' => 0
        ];

        $resultado = [];

        foreach ($edades as $edad) {
            if ($edad >= 0 && $edad <= 12) {
                $categoria = 'Niño';
                $estadisticas['ninos']++;
            }
            elseif ($edad >= 13 && $edad <= 17) {
                $categoria = 'Adolescente';
                $estadisticas['adolescentes']++;
            }
            elseif ($edad >= 18 && $edad <= 64) {
                $categoria = 'Adulto';
                $estadisticas['adultos']++;
            }
            // Cambiado a condición explícita gracias al filtro del controlador
            elseif ($edad >= 65 && $edad <= 120) {
                $categoria = 'Adulto Mayor';
                $estadisticas['adultosMayores']++;
            }

            $resultado[] = [
                'edad' => $edad,
                'categoria' => $categoria
            ];
        }

        return [
            'resultado' => $resultado,
            'estadisticas' => $estadisticas
        ];
    }
}