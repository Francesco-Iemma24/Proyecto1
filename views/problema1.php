<?php
use App\Controllers\Problema1Controller;

$resultado = null;

if (isset($_POST['calcular'])) {
    $numeros = [];
    for ($i = 1; $i <= 5; $i++) {
        $numeros[] = filter_input(INPUT_POST, "n$i", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }
    $resultado = Problema1Controller::procesar($numeros);
}
?>
<main>
<div class="problem-page">

    <div class="problem-header">
        <div class="eyebrow">Problema #1</div>
        <h2>ESTADÍSTICAS</h2>
        <p>Ingresa 5 números positivos. Se calculará la media, desviación estándar, mínimo y máximo.</p>
    </div>

    <div class="form-card">
        <form method="POST">
            <div class="form-group">
                <label>Ingresa los 5 números</label>
                <div class="inputs-grid">
                    <input type="number" name="n1" placeholder="N1" step="any" min="0" required>
                    <input type="number" name="n2" placeholder="N2" step="any" min="0" required>
                    <input type="number" name="n3" placeholder="N3" step="any" min="0" required>
                    <input type="number" name="n4" placeholder="N4" step="any" min="0" required>
                    <input type="number" name="n5" placeholder="N5" step="any" min="0" required>
                </div>
            </div>
            <button type="submit" name="calcular">Calcular → </button>
        </form>
    </div>

    <?php if ($resultado && isset($resultado['error'])): ?>
        <div class="resultado" style="border-left: 4px solid #ef4444; background-color: #fef2f2;">
            <div class="resultado-label" style="color: #b91c1c;">Error de Validación</div>
            <p style="color: #991b1b; margin: 5px 0 0 0; font-size: 15px;">
                <?= htmlspecialchars($resultado['error']) ?>
            </p>
        </div>
    <?php elseif ($resultado): ?>
    <div class="resultado">
        <div class="resultado-label">Resultado</div>
        <div class="stat-row">
            <div class="stat-box">
                <span class="stat-val"><?= number_format($resultado['media'], 2) ?></span>
                <span class="stat-label">Media</span>
            </div>
            <div class="stat-box">
                <span class="stat-val"><?= number_format($resultado['desviacion'], 2) ?></span>
                <span class="stat-label">Desv. Std</span>
            </div>
            <div class="stat-box">
                <span class="stat-val"><?= htmlspecialchars($resultado['minimo']) ?></span>
                <span class="stat-label">Mínimo</span>
            </div>
            <div class="stat-box">
                <span class="stat-val"><?= htmlspecialchars($resultado['maximo']) ?></span>
                <span class="stat-label">Máximo</span>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>
</main>