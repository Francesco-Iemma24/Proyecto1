<?php

require_once __DIR__ . '/../models/Problema5.php';

class Problema5Controller
{
    public static function resolver($edades)
    {
        // 1. Validar que se haya recibido un arreglo
        if (!is_array($edades)) {
            return ['error' => 'Los datos provistos no son válidos.'];
        }

        // 2. Filtrar el arreglo para eliminar valores nulos o cadenas vacías
        $edadesLimpias = array_filter($edades, function($valor) {
            return $valor !== null && $valor !== '';
        });

        // 3. Si no mandaron ninguna edad, retornar error
        if (empty($edadesLimpias)) {
            return ['error' => 'Por favor, ingrese al menos una edad para clasificar.'];
        }

        $edadesValidadas = [];
        foreach ($edadesLimpias as $edad) {
            // 4. Validar que sea numérico y que esté en un rango humano real (0 a 120 años)
            if (is_numeric($edad) && $edad >= 0 && $edad <= 120) {
                $edadesValidadas[] = (int)$edad;
            } else {
                return ['error' => 'Se detectó una edad inválida o fuera del rango permitido (0 - 120).'];
            }
        }

        // 5. Enviar los datos completamente seguros al modelo
        return Problema5::clasificarEdades($edadesValidadas);
    }
}