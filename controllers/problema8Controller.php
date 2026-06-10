<?php

namespace App\Controllers;
use App\Models\Problema8;

class Problema8Controller
{
    public static function procesar($fecha)
    {
        // 1. Validar que la fecha no venga vacía o nula
        if ($fecha === null || trim($fecha) === '') {
            return [
                'error' => 'Por favor, seleccione una fecha válida.',
                'fecha_formateada' => '--', 'estacion' => 'No ingresada', 'imagen' => 'default.jpg'
            ];
        }

        // 2. Validar estructuralmente si el string es una fecha real
        // Si strtotime() no puede parsearla, frena el procesamiento de inmediato
        $timestamp = strtotime($fecha);
        if ($timestamp === false) {
            return [
                'error' => 'El formato de fecha ingresado es totalmente inválido.',
                'fecha_formateada' => '--', 'estacion' => 'Error', 'imagen' => 'default.jpg'
            ];
        }

        // 3. Si es un tiempo válido, delegamos de forma estática al modelo
        return Problema8::obtenerEstacion($fecha);
    }
}