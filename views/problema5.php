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

<main>
<div class="problem-page">

    <div class="problem-header">
        <div class="eyebrow">Problema #5</div>
        <h2>CLASIFICACIÓN DE EDADES</h2>
        <p>Ingresa 5 edades y serán clasificadas como Niño, Adolescente, Adulto o Adulto Mayor.</p>
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
    <div class="resultado">
        <div class="resultado-label"><?= count($datos['resultado']) ?> edades clasificadas</div>
        <ul>
            <?php foreach ($datos['resultado'] as $fila): ?>
                <li><?= htmlspecialchars($fila['edad']) ?> años → <?= htmlspecialchars($fila['categoria']) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

</div>
</main>