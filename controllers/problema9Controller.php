<?php

namespace App\Controllers;
use App\Models\Problema9;

class Problema9Controller
{
    public static function procesar($numero)
    {
        // 1. Validar si la entrada está vacía, nula o no es numérica
        if ($numero === null || $numero === '' || !is_numeric($numero)) {
            return ['error' => 'Por favor, ingrese un número válido.'];
        }

        // Convertimos a entero ya que el rango es del 1 al 9
        $numero = (int)$numero;

        // 2. Control estricto del rango de negocio (OWASP A04: Validación de Entradas)
        if ($numero < 1 || $numero > 9) {
            return ['error' => 'El número base es inválido. Debe estar comprendido estrictamente entre 1 y 9.'];
        }

        // 3. Llamada segura al modelo
        return Problema9::generarPotencias($numero);
    }
}