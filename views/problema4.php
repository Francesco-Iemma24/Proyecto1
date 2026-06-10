<?php
use App\Controllers\Problema4Controller;


$resultado = null;
if (isset($_POST['calcular'])) {
    $resultado = Problema4Controller::procesar();
}
?>
<main>
<div class="problem-page">

    <div class="problem-header">
        <div class="eyebrow">Problema #4</div>
        <h2>PARES E IMPARES</h2>
        <p>Suma independiente de números pares e impares comprendidos entre 1 y 200.</p>
    </div>

    <div class="form-card">
        <form method="POST">
            <p style="font-family:var(--font-m);font-size:.78rem;color:var(--muted);margin-bottom:18px;">
                Rango fijo: <span style="color:var(--lime);">1 → 200</span>. Los números se clasifican automáticamente.
            </p>
            <button type="submit" name="calcular">Calcular Suma → </button>
        </form>
    </div>

    <?php if ($resultado): ?>
    <div class="resultado">
        <div class="resultado-label">Resultado</div>
        <div class="stat-row">
            <div class="stat-box">
                <span class="stat-val" style="color:#c8f135;"><?= htmlspecialchars(number_format($resultado['pares'])) ?></span>
                <span class="stat-label">Suma Pares</span>
            </div>
            <div class="stat-box">
                <span class="stat-val" style="color:#35f1f1;"><?= htmlspecialchars(number_format($resultado['impares'])) ?></span>
                <span class="stat-label">Suma Impares</span>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>
</main>