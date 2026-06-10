<?php
namespace App\Models;


class Problema3
{
    public static function resolver($n)
    {
        $resultado = [];

        for ($i = 1; $i <= $n; $i++) {
            $resultado[] = $i * 4;
        }

        return $resultado;
    }
}