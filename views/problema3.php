<?php
require_once 'controllers/Problema3Controller.php';
require_once 'utils/Navegacion.php';

$resultado = [];
if (isset($_POST['calcular'])) {
    $n = filter_input(INPUT_POST, 'cantidad', FILTER_SANITIZE_NUMBER_INT);
    $resultado = Problema3Controller::procesar($n);
}
?>
<main>
<div class="problem-page">


    <div class="problem-header">
        <div class="eyebrow">Problema #3</div>
        <h2>MÚLTIPLOS DE 4</h2>
        <p>Ingresa un valor N y se generarán los N primeros múltiplos de 4.</p>
    </div>

    <div class="form-card">
        <form method="POST">
            <div class="form-group">
                <label>Cantidad de múltiplos (N)</label>
                <input type="number" name="cantidad" placeholder="Ej: 10" min="1" max="500" required>
            </div>
            <button type="submit" name="calcular">Generar → </button>
        </form>
    </div>

    <?php if (!empty($resultado)): ?>
    <div class="resultado">
        <div class="resultado-label"><?= count($resultado) ?> múltiplos generados</div>
        <ul>
            <?php foreach ($resultado as $m): ?>
                <li><?= htmlspecialchars($m) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

</div>
</main>