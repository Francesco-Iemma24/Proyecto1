<?php

require_once __DIR__ . '/../models/Problema7.php';

class Problema7Controller
{
    public function procesar($notas)
    {
        if (empty($notas) || !is_array($notas)) {
            return [
                'promedio' => 0,
                'desviacion' => 0,
                'minima' => 0,
                'maxima' => 0
            ];
        }

        $modelo = new Problema7();
        return $modelo->calcular($notas);
    }
}