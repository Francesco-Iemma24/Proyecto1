<?php

require_once 'views/header.php';
require_once 'views/menu.php';

$problema = $_GET['problema'] ?? '';

switch ($problema) {

    case '1':
        require 'views/problema1.php';
        break;

    case '2':
        require 'views/problema2.php';
        break;

    case '3':
        require 'views/problema3.php';
        break;

    case '4':
        require 'views/problema4.php';
        break;

    default:
        echo "<h2>Seleccione un problema</h2>";
}

require_once 'views/footer.php';