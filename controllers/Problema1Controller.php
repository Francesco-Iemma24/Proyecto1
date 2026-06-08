<?php

require_once __DIR__ . '/../models/Problema1.php';

class Problema1Controller
{
    public static function procesar(array $numeros)
    {
        // 1. Filtrar el arreglo para eliminar campos vacíos o nulos
        $numerosLimpios = array_filter($numeros, function($valor) {
            return $valor !== null && $valor !== '';
        });

        // 2. Validar que el arreglo no se haya quedado vacío tras la limpieza
        if (empty($numerosLimpios)) {
            return [
                'error' => 'Por favor, ingrese al menos un número válido.',
                'media' => 0, 'desviacion' => 0, 'minimo' => 0, 'maximo' => 0
            ];
        }

        // 3. Sanitizar y convertir cada elemento estrictamente a valor numérico (float/int)
        // Esto neutraliza cualquier intento de inyección de strings maliciosos
        $numerosFinales = [];
        foreach ($numerosLimpios as $num) {
            if (is_numeric($num)) {
                $numerosFinales[] = (float)$num;
            } else {
                return [
                    'error' => 'Se detectaron caracteres no numéricos inválidos.',
                    'media' => 0, 'desviacion' => 0, 'minimo' => 0, 'maximo' => 0
                ];
            }
        }

        // 4. Una vez seguro, se envía al modelo
        return Problema1::resolver($numerosFinales);
    }
}