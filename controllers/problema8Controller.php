<?php

require_once __DIR__ . '/../models/Problema8.php';

class Problema8Controller
{
    public function procesar($fecha)
    {
        // 1. Validar que la fecha no venga vacía
        if (empty($fecha)) {
            return [
                'fecha_formateada' => '--',
                'estacion' => 'Fecha no válida',
                'imagen' => 'default.jpg'
            ];
        }

        // 2. Instanciar el modelo del problema 8
        $modelo = new Problema8();
        $resultado = $modelo->obtenerEstacion($fecha);

        // 3. Retornar los datos limpios para la vista
        return [
            'fecha_formateada' => $resultado['fecha_formateada'],
            'estacion'         => $resultado['estacion'],
            'imagen'           => $resultado['imagen']
        ];
    }
}