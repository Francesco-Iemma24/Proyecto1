<?php

class Problema2
{
    public static function resolver()
    {
        $suma = 0;

        for ($i = 1; $i <= 1000; $i++) {
            $suma += $i;
        }

        return $suma;
    }
}