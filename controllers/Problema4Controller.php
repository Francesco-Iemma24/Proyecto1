<?php

namespace App\Controllers;

use App\Models\Problema4;


class Problema4Controller
{
    public static function procesar()
    {
        return Problema4::resolver();
    }
}