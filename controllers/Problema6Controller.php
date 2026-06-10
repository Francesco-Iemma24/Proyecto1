<?php

namespace App\Controllers;
use App\Models\Problema6;

class Problema6Controller
{
    public static function resolver($presupuesto)
    {
        // 1. Validar si la entrada está vacía o no es numérica
        if ($presupuesto === null || $presupuesto === '' || !is_numeric($presupuesto)) {
            return ['error' => 'Por favor, ingrese un monto de presupuesto válido.'];
        }

        // 2. Convertir explícitamente a tipo float para asegurar la naturaleza del dato
        $presupuesto = (float)$presupuesto;

        // 3. Validar que el presupuesto no sea cero ni negativo
        if ($presupuesto <= 0) {
            return ['error' => 'El presupuesto hospitalario debe ser un monto mayor a 0.'];
        }

        // 4. Si pasa los filtros, se procesa de forma segura en el modelo
        return Problema6::calcularPresupuesto($presupuesto);
    }
}