<?php
use App\Controllers\Problema2Controller;
use App\Utils\Navegacion;

$resultado = null;
if (isset($_POST['calcular'])) {
    $resultado = Problema2Controller::procesar();
}
?>
<main>
<div class="problem-page">

    <div class="problem-header">
        <div class="eyebrow">Problema #2</div>
        <h2>SUMA 1–1,000</h2>
        <p>Calcula la suma acumulada de todos los enteros comprendidos entre 1 y 1,000.</p>
    </div>

    <div class="form-card">
        <form method="POST">
            <p style="font-family:var(--font-m);font-size:.78rem;color:var(--muted);margin-bottom:18px;">
                Rango fijo: <span style="color:var(--lime);">1 → 1,000</span>. Presiona calcular para ejecutar.
            </p>
            <button type="submit" name="calcular">Calcular suma → </button>
        </form>
    </div>

    <?php if ($resultado !== null): ?>
    <div class="resultado">
        <div class="resultado-label">Resultado</div>
        <div class="stat-row">
            <div class="stat-box" style="grid-column:1/-1;">
                <span class="stat-val" style="font-size:3rem;"><?= htmlspecialchars(number_format($resultado)) ?></span>
                <span class="stat-label">Suma total de 1 al 1,000</span>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>
</main>