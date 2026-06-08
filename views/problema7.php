<?php

require_once 'controllers/Problema7Controller.php';

$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $notasTexto = $_POST['notas'];

    // 1. Separamos por comas tal como lo tenías
    $notasSeparadas = explode(',', $notasTexto);

    // 2. Corregimos usando una función anónima con trim() para limpiar 
    // espacios invisibles antes de convertir a floatval
    $notas = array_map(function($nota) {
        return floatval(trim($nota));
    }, $notasSeparadas);

    // 3. Instanciamos tu controlador
    $controlador = new Problema7Controller();

    // 4. Ejecutamos el método procesar pasándole el arreglo limpio
    $resultado = $controlador->procesar($notas);
}
?>

<main>
<div class="problem-page">

    <div class="problem-header">
        <div class="eyebrow">Problema #7</div>
        <h2>DATOS ESTADÍSTICOS</h2>
        <p>Ingresa las notas separadas por comas. Se calculará promedio, desviación estándar, mínima y máxima.</p>
    </div>

    <div class="form-card">
        <form method="POST">
            <div class="form-group">
                <label>Ingresa las notas separadas por comas</label>
                <input type="text" name="notas" placeholder="80,90,75,100" required>
            </div>
            <button type="submit">Calcular →</button>
        </form>
    </div>

    <?php if ($resultado): ?>
    <div class="resultado">
        <div class="resultado-label">Resultado</div>
        <div class="stat-row">
            <div class="stat-box">
                <span class="stat-val"><?= number_format($resultado['promedio'], 2) ?></span>
                <span class="stat-label">Promedio</span>
            </div>
            <div class="stat-box">
                <span class="stat-val"><?= number_format($resultado['desviacion'], 2) ?></span>
                <span class="stat-label">Desv. Std</span>
            </div>
            <div class="stat-box">
                <span class="stat-val"><?= $resultado['minima'] ?></span>
                <span class="stat-label">Nota mínima</span>
            </div>
            <div class="stat-box">
                <span class="stat-val"><?= $resultado['maxima'] ?></span>
                <span class="stat-label">Nota máxima</span>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>
</main>