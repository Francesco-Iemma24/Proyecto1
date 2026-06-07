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

<h2>Problema 7 - Datos Estadísticos</h2>

<form method="POST">

    <label>
        Ingrese las notas separadas por comas:
    </label>

    <br><br>

    <input
        type="text"
        name="notas"
        placeholder="80,90,75,100">

    <br><br>

    <button type="submit">
        Calcular
    </button>

</form>

<?php if ($resultado) : ?>

<div class="resultado">

    <p><strong>Promedio:</strong>
        <?= $resultado['promedio'] ?>
    </p>

    <p><strong>Desviación estándar:</strong>
        <?= $resultado['desviacion'] ?>
    </p>

    <p><strong>Nota mínima:</strong>
        <?= $resultado['minima'] ?>
    </p>

    <p><strong>Nota máxima:</strong>
        <?= $resultado['maxima'] ?>
    </p>

</div>

<?php endif; ?>