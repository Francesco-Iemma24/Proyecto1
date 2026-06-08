<?php
require_once 'controllers/Problema7Controller.php';

$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Capturamos la cadena de texto de forma segura utilizando filter_input
    $notasTexto = filter_input(INPUT_POST, 'notas', FILTER_DEFAULT) ?? '';

    if (!empty(trim($notasTexto))) {
        // 2. Separamos por comas
        $notasSeparadas = explode(',', $notasTexto);

        // 3. Limpiamos espacios en blanco invisibles, pero dejamos el string original
        // para que el controlador verifique si realmente es un número legítimo.
        $notas = array_map('trim', $notasSeparadas);

        // 4. Ejecutamos el método estático del controlador seguro
        $resultado = Problema7Controller::procesar($notas);
    } else {
        $resultado = ['error' => 'Por favor, ingrese una lista de notas separadas por comas.'];
    }
}
?>

<main>
<div class="problem-page">

    <div class="problem-header">
        <div class="eyebrow">Problema #7</div>
        <h2>DATOS ESTADÍSTICOS</h2>
        <p>Ingresa una lista de notas separadas por comas y se calcularán las estadísticas.</p>
    </div>

    <div class="form-card">
        <form method="POST">
            <div class="form-group">
                <label>Notas separadas por comas</label>
                <input type="text" name="notas" placeholder="80,90,75,100" required>
            </div>
            <button type="submit">Calcular →</button>
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
        <div class="resultado-label">Estadísticas Generadas</div>
        <div class="stat-row">
            <div class="stat-box">
                <span class="stat-val"><?= htmlspecialchars($resultado['promedio']) ?></span>
                <span class="stat-label">Promedio</span>
            </div>
            <div class="stat-box">
                <span class="stat-val"><?= htmlspecialchars($resultado['desviacion']) ?></span>
                <span class="stat-label">Desviación estándar</span>
            </div>
            <div class="stat-box">
                <span class="stat-val"><?= htmlspecialchars($resultado['minima']) ?></span>
                <span class="stat-label">Nota mínima</span>
            </div>
            <div class="stat-box">
                <span class="stat-val"><?= htmlspecialchars($resultado['maxima']) ?></span>
                <span class="stat-label">Nota máxima</span>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>
</main>