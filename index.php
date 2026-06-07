<?php

require_once 'views/header.php';

$problema = filter_input(INPUT_GET, 'problema', FILTER_SANITIZE_NUMBER_INT) ?? '';

if ($problema === '' || $problema === null) {
    require 'views/menu.php';
} else {
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

        case '7':
            require 'views/problema7.php';
            break;

        case '9':
            require 'views/problema9.php';
            break;
        default:
            echo '<main><p style="text-align:center;color:var(--muted);font-family:var(--font-mono);">Problema no encontrado.</p></main>';
    }
}

require_once 'views/footer.php';
