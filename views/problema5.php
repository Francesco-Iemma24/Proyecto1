<?php
require_once 'controllers/Problema5Controller.php';

$datos = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edades = [];
    for ($i = 1; $i <= 5; $i++) {
        // Recogemos los datos crudos (dejamos que el controlador se encargue de sanitizar y validar)
        $edades[] = $_POST["edad$i"] ?? '';
    }

    $datos = Problema5Controller::resolver($edades);
}
?>

<h2>Problema #5 - Clasificación de Edades</h2>

<form method="POST">
    <?php for($i=1; $i<=5; $i++): ?>
        <label>Edad <?= $i ?>:</label>
        <input
            type="number"
            name="edad<?= $i ?>"
            min="0"
            max="120"
            required>
        <br><br>
    <?php endfor; ?>

    <button type="submit">
        Procesar
    </button>
</form>

<?php if ($datos && isset($datos['error'])): ?>
    <hr>
    <div class="error-box" style="border-left: 4px solid #ef4444; background-color: #fef2f2; padding: 15px; margin-top: 20px;">
        <h3 style="color: #b91c1c; margin: 0 0 5px 0;">Error de Validación</h3>
        <p style="color: #991b1b; margin: 0; font-size: 15px;">
            <?= htmlspecialchars($datos['error']) ?>
        </p>
    </div>

<?php elseif ($datos && isset($datos['resultado'])): ?>
<hr>
<h3>Resultados</h3>

<table border="1" cellpadding="10" style="border-collapse: collapse; width: 100%; max-width: 400px;">
<tr style="background-color: #f3f4f6;">
    <th>Edad</th>
    <th>Categoría</th>
</tr>
<?php foreach($datos['resultado'] as $fila): ?>
<tr>
    <td><?= htmlspecialchars($fila['edad']) ?></td>
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
                // Forzamos el casteo a entero al imprimir en JS por seguridad total
                data: [
                    <?= (int)$datos['estadisticas']['ninos'] ?>,
                    <?= (int)$datos['estadisticas']['adolescentes'] ?>,
                    <?= (int)$datos['estadisticas']['adultos'] ?>,
                    <?= (int)$datos['estadisticas']['adultosMayores'] ?>
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 } // Al ser personas, mostramos saltos enteros de 1 en 1
                }
            }
        }
    }
);
</script>
<?php endif; ?>

<br><br>
<a href="index.php">Volver al menú</a>