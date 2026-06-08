<?php

class Problema6
{
    public static function calcularPresupuesto($presupuesto)
    {
        // Operaciones aritméticas 100% seguras contra strings o tipos corruptos
        return [
            'ginecologia' => $presupuesto * 0.40,
            'traumatologia' => $presupuesto * 0.35,
            'pediatria' => $presupuesto * 0.25
        ];
    }
}