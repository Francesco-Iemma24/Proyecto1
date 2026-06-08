<?php
require_once 'controllers/Problema9Controller.php';

$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['base_numero'])) {
    // Sanitizamos la entrada como un número entero
    $base = filter_input(INPUT_POST, 'base_numero', FILTER_SANITIZE_NUMBER_INT);
    
    $resultado = Problema9Controller::procesar($base);
}
?>

<h2>Problema #9 - Potencias Sucesivas (1 al 9)</h2>

<form method="POST">
    <div class="form-group">
        <label>Número Base (Dígito del 1 al 9):</label>
        <input 
            type="number" 
            name="base_numero" 
            min="1" 
            max="9" 
            placeholder="Ej: 5"
            required>
    </div>
    <button type="submit">Generar Potencias →</button>
</form>

<?php if ($resultado && isset($resultado['error'])): ?>
    <hr>
    <div class="error-box" style="border-left: 4px solid #ef4444; background-color: #fef2f2; padding: 15px; margin-top: 20px;">
        <h3 style="color: #b91c1c; margin: 0 0 5px 0;">Error de Validación</h3>
        <p style="color: #991b1b; margin: 0; font-size: 15px;">
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

<br><br>
<a href="index.php">Volver al menú</a>