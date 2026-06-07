<?php

class Problema9
{
    public function generarPotencias($numero)
    {
        $potencias = [];

        for ($i = 1; $i <= 15; $i++) {

            $potencias[$i] = pow($numero, $i);

        }

        return $potencias;
    }
}