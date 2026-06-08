<?php

require_once __DIR__ . '/../models/Problema7.php';

class Problema7Controller
{
    public static function procesar($notas)
    {
        // 1. Validar que la entrada sea efectivamente un arreglo
        if (!is_array($notas)) {
            return ['error' => 'Los datos provistos son inválidos.'];
        }

        // 2. Limpiar el arreglo removiendo campos vacíos o nulos
        $notasLimpias = array_filter($notas, function($valor) {
            return $valor !== null && $valor !== '';
        });

        // 3. Evitar procesamiento si el arreglo quedó vacío (Mitiga División por Cero)
        if (empty($notasLimpias)) {
            return [
                'error' => 'Por favor, ingrese al menos una nota válida.',
                'promedio' => 0, 'desviacion' => 0, 'minima' => 0, 'maxima' => 0
            ];
        }

        // 4. Validar que cada elemento sea un número real dentro de la escala académica (0 a 100)
        $notasValidadas = [];
        foreach ($notasLimpias as $nota) {
            if (is_numeric($nota) && $nota >= 0 && $nota <= 100) {
                $notasValidadas[] = (float)$nota;
            } else {
                return [
                    'error' => 'Se detectaron notas inválidas o fuera del rango académico permitido (0 - 100).',
                    'promedio' => 0, 'desviacion' => 0, 'minima' => 0, 'maxima' => 0
                ];
            }
        }

        // 5. Enviar los datos completamente puros al Modelo
        return Problema7::calcularEstadisticas($notasValidadas);
    }
}