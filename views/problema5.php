<?php
require_once 'controllers/Problema5Controller.php';

$datos = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edades = [];
    for ($i = 1; $i <= 5; $i++) {
        $edades[] = $_POST["edad$i"] ?? '';
    }

    $datos = Problema5Controller::resolver($edades);
}
?>

<main>
<div class="problem-page">

    <div class="problem-header">
        <div class="eyebrow">Problema #5</div>
        <h2>CLASIFICACIÓN DE EDADES</h2>
        <p>Ingresa 5 edades. El sistema las clasificará como Niño, Adolescente, Adulto o Adulto Mayor y generará estadísticas por categoría.</p>
    </div>

    <div class="form-card">
        <form method="POST">
            <div class="form-group">
                <label>Ingresa las 5 edades</label>
                <div class="inputs-grid">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <input type="number" name="edad<?= $i ?>" placeholder="Edad <?= $i ?>" min="0" max="120" required>
                    <?php endfor; ?>
                </div>
            </div>
            <button type="submit">Procesar →</button>
        </form>
    </div>

    <?php if ($datos && isset($datos['error'])): ?>
        <div class="resultado" style="border-left: 4px solid #ef4444; background-color: #fef2f2;">
            <div class="resultado-label" style="color: #b91c1c;">Error de Validación</div>
            <p style="color: #991b1b; margin: 5px 0 0 0; font-size: 15px;">
                <?= htmlspecialchars($datos['error']) ?>
            </p>
        </div>

    <?php elseif ($datos && isset($datos['resultado'])): ?>

        <?php
            $estadisticas = $datos['estadisticas'];
            $total = count($datos['resultado']);
        ?>

        <!-- Clasificación + Estadísticas unificadas -->
        <div class="resultado">
            <div class="resultado-label"><?= $total ?> edades clasificadas</div>
            <table style="width:100%; border-collapse: collapse; margin-top: 12px;">
                <thead>
                    <tr>
                        <th style="text-align:left; padding: 6px 10px; border-bottom: 1px solid #2d2d2d; font-size: 12px; letter-spacing: 0.05em;">EDAD</th>
                        <th style="text-align:left; padding: 6px 10px; border-bottom: 1px solid #2d2d2d; font-size: 12px; letter-spacing: 0.05em;">CATEGORÍA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos['resultado'] as $fila): ?>
                        <tr>
                            <td style="padding: 6px 10px;"><?= htmlspecialchars($fila['edad']) ?> años</td>
                            <td style="padding: 6px 10px;"><strong><?= htmlspecialchars($fila['categoria']) ?></strong></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div style="border-top: 1px solid #2d2d2d; margin-top: 16px; padding-top: 14px;">
                <div class="resultado-label" style="margin-bottom: 10px;">Estadísticas por Categoría</div>
                <table style="width:100%; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <td style="padding: 5px 10px;">Niño (0–12)</td>
                            <td style="padding: 5px 10px;"><strong><?= $estadisticas['ninos'] ?></strong> persona<?= $estadisticas['ninos'] !== 1 ? 's' : '' ?></td>
                            <td style="padding: 5px 10px;">Adolescente (13–17)</td>
                            <td style="padding: 5px 10px;"><strong><?= $estadisticas['adolescentes'] ?></strong> persona<?= $estadisticas['adolescentes'] !== 1 ? 's' : '' ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 10px;">Adulto (18–64)</td>
                            <td style="padding: 5px 10px;"><strong><?= $estadisticas['adultos'] ?></strong> persona<?= $estadisticas['adultos'] !== 1 ? 's' : '' ?></td>
                            <td style="padding: 5px 10px;">Adulto Mayor (65+)</td>
                            <td style="padding: 5px 10px;"><strong><?= $estadisticas['adultosMayores'] ?></strong> persona<?= $estadisticas['adultosMayores'] !== 1 ? 's' : '' ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Gráfica de barras -->
        <div class="grafica-box-dark" style="background: #111827; padding: 25px; border-radius: 16px; border: 1px solid #1f2937; margin: 30px auto 0 auto; max-width: 520px; box-shadow: 0 10px 25px rgba(0,0,0,0.3);">
            <div style="position: relative; height: 300px; width: 100%;">
                <canvas id="graficaEdades"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        let chartExistente = Chart.getChart("graficaEdades");
        if (chartExistente) {
            chartExistente.destroy();
        }

        new Chart(document.getElementById('graficaEdades'), {
            type: 'bar',
            data: {
                labels: ['Niño (0–12)', 'Adolescente (13–17)', 'Adulto (18–64)', 'Adulto Mayor (65+)'],
                datasets: [{
                    label: 'Cantidad de personas',
                    data: [
                        <?= (int)$estadisticas['ninos'] ?>,
                        <?= (int)$estadisticas['adolescentes'] ?>,
                        <?= (int)$estadisticas['adultos'] ?>,
                        <?= (int)$estadisticas['adultosMayores'] ?>
                    ],
                    backgroundColor: [
                        'rgba(200, 241, 53, 0.85)',
                        'rgba(14, 165, 233, 0.85)',
                        'rgba(244, 63, 94, 0.85)',
                        'rgba(168, 85, 247, 0.85)'
                    ],
                    borderColor: ['#c8f135', '#0ea5e9', '#f43f5e', '#a855f7'],
                    borderWidth: 1.5,
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            color: '#f8fafc',
                            font: { size: 12 }
                        },
                        grid: { color: 'rgba(255,255,255,0.08)' }
                    },
                    x: {
                        ticks: {
                            color: '#f8fafc',
                            font: { size: 11 }
                        },
                        grid: { display: false }
                    }
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1f2937',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        borderColor: '#374151',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                return ' ' + context.parsed.y + ' persona(s)';
                            }
                        }
                    }
                }
            }
        });
        </script>

    <?php endif; ?>

</div>
</main>