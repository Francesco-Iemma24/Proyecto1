<?php
// 1. IMPORTANTE: Requerir los archivos necesarios para que PHP reconozca las clases
namespace App\Controllers;
      

// Captura del POST y llamado al controlador correspondiente
$resultado = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fecha_usuario'])) {
    // Sanitizamos levemente el string recibido antes de pasarlo al backend
    $fechaInput = filter_input(INPUT_POST, 'fecha_usuario', FILTER_DEFAULT);
    
    // LLAMADA ESTÁTICA UNIFICADA: Se remueve la inicialización por objeto
    $resultado = Problema8Controller::procesar($fechaInput);
}
?>

<main style="padding: 20px;">
    <div class="card-estacion" style="max-width: 450px; margin: 0 auto; background: white; padding: 25px; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; font-family: sans-serif;">
        
        <h2 style="color: #1e293b; margin-bottom: 20px;">¿Qué estación es?</h2>
        
        <form method="POST" action="">
            <input type="date" name="fecha_usuario" required style="width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #cbd5e1; border-radius: 8px; box-sizing: border-box; font-size: 16px;">
            
            <button type="submit" style="width: 100%; padding: 12px; background-color: #2563eb; color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer;">
                Mostrar
            </button>
        </form>

        <?php if ($resultado && isset($resultado['error'])): ?>
            <div class="error-box" style="border-left: 4px solid #ef4444; background-color: #fef2f2; padding: 15px; margin-top: 25px; border-radius: 8px; text-align: left;">
                <h4 style="color: #b91c1c; margin: 0 0 5px 0;">Error de Entrada</h4>
                <p style="color: #991b1b; margin: 0; font-size: 14px;">
                    <?= htmlspecialchars($resultado['error']) ?>
                </p>
            </div>

        <?php elseif ($resultado && isset($resultado['estacion'])): ?>
            <div class="resultado-box" style="margin-top: 25px; padding-top: 20px; border-top: 1px solid #f1f5f9;">
                <p style="color: #475569; font-size: 18px; margin: 5px 0;">
                    Fecha ingresada: <strong><?php echo htmlspecialchars($resultado['fecha_formateada']); ?></strong>
                </p>
                <p style="color: #475569; font-size: 18px; margin: 5px 0;">
                    La estación es: <strong><?php echo htmlspecialchars($resultado['estacion']); ?></strong>
                </p>
                
                <div style="margin-top: 15px; border-radius: 12px; overflow: hidden;">
                    <img src="assets/img/<?php echo htmlspecialchars($resultado['imagen']); ?>" 
                         alt="<?php echo htmlspecialchars($resultado['estacion']); ?>" 
                         style="width: 100%; max-height: 250px; object-fit: cover; display: block;">
                </div>
            </div>
        <?php endif; ?>

    </div>
</main>