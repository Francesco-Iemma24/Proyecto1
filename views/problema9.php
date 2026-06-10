<?php
use App\Controllers\Problema9Controller;


$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['base_numero'])) {
    // Sanitizamos la entrada como un número entero
    $base = filter_input(INPUT_POST, 'base_numero', FILTER_SANITIZE_NUMBER_INT);
    
    $resultado = Problema9Controller::procesar($base);
}
?>

<main>
<div class="problem-page">

    <div class="problem-header">
        <div class="eyebrow">Problema #9</div>
        <h2>POTENCIAS SUCESIVAS</h2>
        <p>Ingresa un número del 1 al 9 y se generarán sus primeras 15 potencias.</p>
    </div>

    <div class="form-card">
        <form method="POST">
            <div class="form-group">
                <label>Número Base (Dígito del 1 al 9)</label>
                <input type="number" name="base_numero" min="1" max="9" placeholder="Ej: 5" required>
            </div>
            <button type="submit">Generar Potencias →</button>
        </form>
    </div>

    <?php if ($resultado && isset($resultado['error'])): ?>
        <div class="resultado" style="border-left: 4px solid #ef4444; background-color: #fef2f2;">
            <div class="resultado-label" style="color: #b91c1c;">Error de Validación</div>
            <p style="color: #991b1b; margin: 5px 0 0 0; font-size: 15px;">
                <?= htmlspecialchars($resultado['error']) ?>
            </p>
        </div>

    <?php elseif (!empty($resultado)): ?>
        <hr>
        <h3>Resultados (Potencias de 1 a 15)</h3>
        <table border="1" cellpadding="8" style="border-collapse: collapse; width: 100%; max-width: 400px; font-family: monospace;">
            <tr style="background-color: #f3f4f6; font-family: sans-serif;">
                <th>Exponente</th>
                <th>Resultado</th>
            </tr>
            <?php foreach ($resultado as $exponente => $valor): ?>
                <tr>
                    <td><sup><?= htmlspecialchars($exponente) ?></sup></td>
                    <td><?= htmlspecialchars(number_format($valor)) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</div>
</main>