<?php

require_once 'controllers/Problema2Controller.php';
require_once 'utils/Navegacion.php';

$resultado = null;

if(isset($_POST['calcular']))
{
    $resultado = Problema2Controller::procesar();
}
?>

<h2>Problema 2</h2>

<form method="POST">

    <button type="submit" name="calcular">
        Calcular suma
    </button>

</form>

<?php if($resultado !== null): ?>

<div class="resultado">

    Resultado: <?= $resultado ?>

</div>

<?php endif; ?>

<?= Navegacion::volverMenu('index.php'); ?>