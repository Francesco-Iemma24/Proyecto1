<?php

class Problema4
{
    public static function resolver()
    {
        $pares = 0;
        $impares = 0;

        for ($i = 1; $i <= 200; $i++) {

            if ($i % 2 == 0) {
                $pares += $i;
            } else {
                $impares += $i;
            }
        }

        return [
            'pares' => $pares,
            'impares' => $impares
        ];
    }
}