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

<main>
<div class="problem-page">

    <div class="problem-header">
        <div class="eyebrow">Problema #9</div>
        <h2>POTENCIAS</h2>
        <p>Ingresa un número del 1 al 9 y se generarán sus primeras 15 potencias.</p>
    </div>

    <div class="form-card">
        <form method="POST">
            <div class="form-group">
                <label>Ingrese un número (1 al 9)</label>
                <input type="number" name="numero" min="1" max="9" required>
            </div>
            <button type="submit">Generar →</button>
        </form>
    </div>

    <?php if (!empty($potencias)): ?>
    <div class="resultado">
        <h3>Primeras 15 potencias</h3>
        <ul>
            <?php foreach ($potencias as $exponente => $valor): ?>
                <li><?= $exponente ?> → <?= $valor ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

</div>
</main>