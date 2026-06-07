<?php
// 1. IMPORTANTE: Requerir los archivos necesarios para que PHP reconozca las clases
require_once 'controllers/Problema8Controller.php';
require_once 'models/problema8.php';

// Captura del POST y llamado al controlador correspondiente
$resultado = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fecha_usuario'])) {
    $controlador = new Problema8Controller();
    $resultado = $controlador->procesar($_POST['fecha_usuario']);
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

        <?php if ($resultado): ?>
            <div class="resultado-box" style="margin-top: 25px; padding-top: 20px; border-top: 1px solid #f1f5f9;">
                <p style="color: #475569; font-size: 18px; margin: 5px 0;">
                    Fecha ingresada: <strong><?php echo htmlspecialchars($resultado['fecha_formateada']); ?></strong>
                </p>
                <p style="color: #475569; font-size: 18px; margin: 5px 0;">
                    La estación es: <strong><?php echo htmlspecialchars($resultado['estacion']); ?></strong>
                </p>
                
                <div style="margin-top: 15px; border-radius: 12px; overflow: hidden;">
                    <img src="assets/img/<?php echo $resultado['imagen']; ?>" alt="<?php echo $resultado['estacion']; ?>" style="width: 100%; max-height: 250px; object-fit: cover; display: block;">
                </div>
            </div>
        <?php endif; ?>

    </div>
</main>