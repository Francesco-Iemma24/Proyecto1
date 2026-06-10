<?php

namespace App\Utils;

use DateTime;

class Utilidades
{
    public static function validarNumero($valor)
    {
        return filter_var($valor, FILTER_VALIDATE_FLOAT);
    }

    public static function limpiarTexto($texto)
    {
        return htmlspecialchars(trim($texto));
    }

    public static function calcularMedia(array $numeros)
    {
        return array_sum($numeros) / count($numeros);
    }

    public static function calcularDesviacion(array $numeros)
    {
        $media = self::calcularMedia($numeros);

        $suma = 0;

        foreach ($numeros as $numero) {
            $suma += pow($numero - $media, 2);
        }

        return sqrt($suma / count($numeros));
    }

    public static function validarFecha($fecha)
    {
        $d = DateTime::createFromFormat('Y-m-d', $fecha);

        return $d && $d->format('Y-m-d') === $fecha;
    }

    public static function escaparSalida($texto)
    {
        return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
    }

    public static function validarEntero($valor)
    {
        return filter_var($valor, FILTER_VALIDATE_INT);
    }
}