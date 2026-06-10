<?php
namespace App\Models;

class Problema9
{
    public static function generarPotencias($numero)
    {
        $potencias = [];

        // Genera las 15 potencias para la base fija (1 a 9)
        for ($i = 1; $i <= 15; $i++) {
            $potencias[$i] = pow($numero, $i);
        }

        return $potencias;
    }
}