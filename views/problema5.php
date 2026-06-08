<?php

require_once 'controllers/Problema5Controller.php';

$datos = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $edades = [];

    for ($i = 1; $i <= 5; $i++) {
        $edades[] = (int) $_POST["edad$i"];
    }

    $datos = Problema5Controller::resolver($edades);
}
?>

<main>
<div class="problem-page">

    <div class="problem-header">
        <div class="eyebrow">Problema #5</div>
        <h2>CLASIFICACIÓN DE EDADES</h2>
        <p>Ingresa 5 edades y se clasificarán en Niños, Adolescentes, Adultos y Adultos Mayores.</p>
    </div>

    <div class="form-card">
        <form method="POST">
            <div class="form-group">
                <?php for($i=1; $i<=5; $i++): ?>
                    <label>Edad <?= $i ?>:</label>
                    <input type="number" name="edad<?= $i ?>" min="0" required>
                    <br><br>
                <?php endfor; ?>
            </div>
            <button type="submit">Procesar →</button>
        </form>
    </div>

    <?php if($datos): ?>
    <div class="resultado">
        <div class="resultado-label">Resultados</div>

        <table border="1" cellpadding="10">
            <tr>
                <th>Edad</th>
                <th>Categoría</th>
            </tr>
            <?php foreach($datos['resultado'] as $fila): ?>
            <tr>
                <td><?= (int)$fila['edad'] ?></td>
                <td><?= htmlspecialchars($fila['categoria']) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <br>

        <div class="grafica-container">
            <canvas id="graficaEdades" width="700" height="350"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        new Chart(
            document.getElementById('graficaEdades'),
            {
                type: 'bar',
                data: {
                    labels: ['Niños', 'Adolescentes', 'Adultos', 'Adultos Mayores'],
                    datasets: [{
                        label: 'Cantidad de Personas',
                        data: [
                            <?= $datos['estadisticas']['ninos'] ?>,
                            <?= $datos['estadisticas']['adolescentes'] ?>,
                            <?= $datos['estadisticas']['adultos'] ?>,
                            <?= $datos['estadisticas']['adultosMayores'] ?>
                        ]
                    }]
                }
            }
        );
        </script>

    </div>
    <?php endif; ?>

</div>
</main>