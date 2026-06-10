<?php
use App\Controllers\Problema7Controller;


$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $notas = $_POST['notas'] ?? [];

    if (is_array($notas) && !empty($notas)) {
        $notas = array_map('trim', $notas);
        $resultado = Problema7Controller::procesar($notas);
    } else {
        $resultado = ['error' => 'Por favor, ingrese al menos una nota válida.'];
    }
}
?>

<main>
<div class="problem-page">

    <div class="problem-header">
        <div class="eyebrow">Problema #7</div>
        <h2>DATOS ESTADÍSTICOS</h2>
        <p>Indica cuántas notas deseas ingresar. El sistema generará los campos automáticamente.</p>
    </div>

    <div class="form-card">

        <!-- Paso 1: cantidad de notas -->
        <div id="paso1">
            <div class="form-group">
                <label>¿Cuántas notas deseas ingresar?</label>
                <input type="number" id="cantidadNotas" placeholder="Ej: 4" min="1" max="50">
            </div>
            <button type="button" onclick="generarCampos()" style="width:100%;background:var(--lime);color:var(--bg);border:none;border-radius:10px;padding:14px;font-family:var(--font-m);font-size:.75rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;cursor:pointer;margin-top:6px;transition:filter .2s,transform .15s;">Generar Campos →</button>
        </div>

        <!-- Paso 2: campos generados dinámicamente -->
        <form method="POST" id="formNotas" style="display:none;">
            <div class="form-group">
                <label id="labelNotas"></label>
                <div class="inputs-grid" id="camposNotas"></div>
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

<script>
function generarCampos() {
    const cantidad = parseInt(document.getElementById('cantidadNotas').value);

    if (isNaN(cantidad) || cantidad < 1 || cantidad > 50) {
        alert('Ingresa una cantidad válida entre 1 y 50.');
        return;
    }

    const contenedor = document.getElementById('camposNotas');
    const label      = document.getElementById('labelNotas');
    const form       = document.getElementById('formNotas');

    contenedor.innerHTML = '';
    label.textContent = 'Ingresa las ' + cantidad + ' notas (0 – 100)';

    for (let i = 1; i <= cantidad; i++) {
        const input       = document.createElement('input');
        input.type        = 'number';
        input.name        = 'notas[]';
        input.placeholder = 'Nota ' + i;
        input.min         = 0;
        input.max         = 100;
        input.required    = true;
        contenedor.appendChild(input);
    }

    form.style.display = 'block';
    document.getElementById('paso1').style.display = 'none';
}
</script>