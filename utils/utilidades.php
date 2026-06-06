<?php

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
}