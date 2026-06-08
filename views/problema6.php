<?php

require_once 'controllers/Problema6Controller.php';

$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $presupuesto = (float) $_POST['presupuesto'];

    $resultado = Problema6Controller::resolver($presupuesto);
}
?>

<main>
<div class="problem-page">

    <div class="problem-header">
        <div class="eyebrow">Problema #6</div>
        <h2>PRESUPUESTO HOSPITALARIO</h2>
        <p>Ingresa el presupuesto anual y se distribuirá entre Ginecología, Traumatología y Pediatría.</p>
    </div>

    <div class="form-card">
        <form method="POST">
            <div class="form-group">
                <label>Presupuesto Anual:</label>
                <input type="number" step="0.01" name="presupuesto" required>
            </div>
            <button type="submit">Calcular →</button>
        </form>
    </div>

    <?php if($resultado): ?>
    <div class="resultado">
        <div class="resultado-label">Distribución</div>

        <p><strong>Ginecología (40%)</strong>: $<?= number_format($resultado['ginecologia'],2) ?></p>
        <p><strong>Traumatología (35%)</strong>: $<?= number_format($resultado['traumatologia'],2) ?></p>
        <p><strong>Pediatría (25%)</strong>: $<?= number_format($resultado['pediatria'],2) ?></p>

        <div class="grafica-container">
            <canvas id="graficaHospital" width="700" height="350"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        new Chart(
            document.getElementById('graficaHospital'),
            {
                type: 'pie',
                data: {
                    labels: ['Ginecología', 'Traumatología', 'Pediatría'],
                    datasets: [{
                        data: [
                            <?= (float)$resultado['ginecologia'] ?>,
                            <?= (float)$resultado['traumatologia'] ?>,
                            <?= (float)$resultado['pediatria'] ?>
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            }
        );
        </script>

    </div>
    <?php endif; ?>

</div>
</main>