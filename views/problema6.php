<?php
// 1. IMPORTANTE: Requerir el controlador para procesar los datos bajo arquitectura MVC
require_once 'controllers/Problema6Controller.php';

$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizamos la entrada contra inyecciones de código y datos malformados (OWASP)
    $presupuesto = filter_input(INPUT_POST, 'presupuesto', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // Llamada segura al método estático del controlador
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
        <form method="POST" action="">
            <div class="form-group">
                <label>Presupuesto Anual:</label>
                <input type="number" step="0.01" min="0.01" name="presupuesto" placeholder="Ej: 1245.00" required>
            </div>
            <button type="submit">Calcular →</button>
        </form>
    </div>

    <?php if ($resultado && isset($resultado['error'])): ?>
        <div class="resultado" style="border-left: 4px solid #ef4444; background-color: #fef2f2;">
            <div class="resultado-label" style="color: #b91c1c;">Error de Validación</div>
            <p style="color: #991b1b; margin: 5px 0 0 0; font-size: 15px; font-family: sans-serif;">
                <?= htmlspecialchars($resultado['error']) ?>
            </p>
        </div>

    <?php elseif ($resultado && isset($resultado['ginecologia'])): ?>
    <div class="resultado">
        <div class="resultado-label">Distribución</div>
        <p><strong>Ginecología (40%)</strong>: $<?= htmlspecialchars(number_format($resultado['ginecologia'], 2)) ?></p>
        <p><strong>Traumatología (35%)</strong>: $<?= htmlspecialchars(number_format($resultado['traumatologia'], 2)) ?></p>
        <p><strong>Pediatría (25%)</strong>: $<?= htmlspecialchars(number_format($resultado['pediatria'], 2)) ?></p>

        <div class="grafica-box-dark" style="background: #111827; padding: 25px; border-radius: 16px; border: 1px solid #1f2937; margin: 30px auto 0 auto; max-width: 480px; box-shadow: 0 10px 25px rgba(0,0,0,0.3);">
            <div style="position: relative; height: 320px; width: 100%;">
                <canvas id="graficaHospital"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    let chartExistente = Chart.getChart("graficaHospital");
    if (chartExistente) {
        chartExistente.destroy();
    }

    const pluginPorcentajesCentrados = {
        id: 'pluginPorcentajesCentrados',
        afterDatasetsDraw(chart) {
            const { ctx } = chart;
            ctx.save();
            chart.data.datasets.forEach((dataset, i) => {
                const meta = chart.getDatasetMeta(i);
                meta.data.forEach((element, index) => {
                    const porcentajes = ['40%', '35%', '25%'];
                    const texto = porcentajes[index];
                    const { x, y } = element.tooltipPosition();
                    ctx.fillStyle = '#ffffff';
                    ctx.font = 'bold 14px sans-serif';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.fillText(texto, x, y);
                });
            });
            ctx.restore();
        }
    };

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
                    ],
                    backgroundColor: [
                        'rgba(244, 63, 94, 0.85)',
                        'rgba(14, 165, 233, 0.85)',
                        'rgba(200, 241, 53, 0.85)'
                    ],
                    borderColor: ['#f43f5e', '#0ea5e9', '#c8f135'],
                    borderWidth: 1.5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: { padding: { top: 15, bottom: 15 } },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#f8fafc',
                            padding: 20,
                            font: { size: 13, weight: '600', family: 'system-ui, sans-serif' }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1f2937',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        borderColor: '#374151',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.parsed || 0;
                                return label + ': $' + value.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                            }
                        }
                    }
                }
            },
            plugins: [pluginPorcentajesCentrados]
        }
    );
    </script>

    <?php endif; ?>

</div>
</main>