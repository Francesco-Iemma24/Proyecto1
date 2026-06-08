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

<h2>Problema 7 - Datos Estadísticos</h2>

<form method="POST">
    <label>
        Ingrese las notas separadas por comas:
    </label>
    <br><br>
    <input
        type="text"
        name="notas"
        placeholder="80,90,75,100"
        required>

    <br><br>
    <button type="submit">
        Calcular
    </button>
</form>

<?php if ($resultado && isset($resultado['error'])) : ?>
    <hr>
    <div class="error-box" style="border-left: 4px solid #ef4444; background-color: #fef2f2; padding: 15px; margin-top: 20px;">
        <h3 style="color: #b91c1c; margin: 0 0 5px 0;">Error de Validación</h3>
        <p style="color: #991b1b; margin: 0; font-size: 15px;">
            <?= htmlspecialchars($resultado['error']) ?>
        </p>
    </div>

<?php elseif ($resultado) : ?>
<div class="resultado">
    <hr>
    <h3>Estadísticas Generadas</h3>
    
    <p><strong>Promedio:</strong>
        <?= htmlspecialchars($resultado['promedio']) ?>
    </p>

    <p><strong>Desviación estándar:</strong>
        <?= htmlspecialchars($resultado['desviacion']) ?>
    </p>

    <p><strong>Nota mínima:</strong>
        <?= htmlspecialchars($resultado['minima']) ?>
    </p>

    <p><strong>Nota máxima:</strong>
        <?= htmlspecialchars($resultado['maxima']) ?>
    </p>
</div>
<?php endif; ?>

<br><br>
<a href="index.php">Volver al menú</a>