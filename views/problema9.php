<?php

require_once 'controllers/Problema9Controller.php';

$potencias = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $numero = intval($_POST['numero']);

    if ($numero >= 1 && $numero <= 9) {

        $controlador = new Problema9Controller();

        $potencias = $controlador->procesar($numero);
    }
}
?>

<h2>Problema 9 - Potencias</h2>

<form method="POST">

    <label>
        Ingrese un número (1 al 9)
    </label>

    <br><br>

    <input
        type="number"
        name="numero"
        min="1"
        max="9"
        required>

    <br><br>

    <button type="submit">
        Generar
    </button>

</form>

<?php if (!empty($potencias)) : ?>

<div class="resultado">

    <h3>Primeras 15 potencias</h3>

    <ul>

        <?php foreach ($potencias as $exponente => $valor) : ?>

            <li>
                <?= $exponente ?>
                →
                <?= $valor ?>
            </li>

        <?php endforeach; ?>

    </ul>

</div>

<?php endif; ?>