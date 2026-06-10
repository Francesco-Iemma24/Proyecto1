<?php

namespace App\Controllers;

use App\Models\Problema3;

class Problema3Controller
{
    public static function procesar($n)
    {
        // 1. Validar que la entrada sea numérica y transformarla estrictamente a entero
        if ($n === null || $n === false || !is_numeric($n)) {
            return ['error' => 'La cantidad ingresada debe ser un número válido.'];
        }

        $n = (int)$n;

        // 2. Blindaje de seguridad contra abuso de recursos (DoS lógico)
        if ($n < 1 || $n > 500) {
            return ['error' => 'Por seguridad, la cantidad debe estar comprendida entre 1 y 500.'];
        }

        // 3. Si todo está limpio, delegar el procesamiento al modelo
        return Problema3::resolver($n);
    }
}