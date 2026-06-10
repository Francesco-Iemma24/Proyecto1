<?php

namespace App\Controllers;

use App\Models\Problema2;



class Problema2Controller
{
    public static function procesar()
    {
        return Problema2::resolver();
    }
}