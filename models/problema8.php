<?php

class Problema8
{
    public static function obtenerEstacion($fecha)
    {
        // Ya viene validada estrictamente desde el controlador seguro
        $timestamp = strtotime($fecha);
        $mes = (int)date('m', $timestamp);
        $dia = (int)date('d', $timestamp);
        
        $fechaFormateada = date('d-m', $timestamp);

        $estacion = "";
        $imagen = "";

        // Lógica de estaciones por calendario
        if (($mes == 9 && $dia >= 21) || ($mes == 10) || ($mes == 11) || ($mes == 12 && $dia <= 20)) {
            $estacion = "Primavera";
            $imagen = "primavera.jpg";
        } elseif (($mes == 12 && $dia >= 21) || ($mes == 1) || ($mes == 2) || ($mes == 3 && $dia <= 20)) {
            $estacion = "Verano";
            $imagen = "verano.jpg";
        } elseif (($mes == 3 && $dia >= 21) || ($mes == 4) || ($mes == 5) || ($mes == 6 && $dia <= 20)) {
            $estacion = "Otoño";
            $imagen = "otoño.jpg";
        } else {
            $estacion = "Invierno";
            $imagen = "invierno.jpg";
        }

        return [
            'fecha_formateada' => $fechaFormateada,
            'estacion' => $estacion,
            'imagen' => $imagen
        ];
    }
}