<?php

require_once 'controllers/Problema4Controller.php';
require_once 'utils/Navegacion.php';

$resultado = null;

if(isset($_POST['calcular']))
{
    $resultado = Problema4Controller::procesar();
}
?>

<h2>Problema 4</h2>

<form method="POST">

    <button type="submit" name="calcular">
        Calcular
    </button>

</form>

<?php if($resultado): ?>

<div class="resultado">

    <p>
        Suma pares:
        <?= $resultado['pares'] ?>
    </p>

    <p>
        Suma impares:
        <?= $resultado['impares'] ?>
    </p>

</div>

<?php endif; ?>

<?= Navegacion::volverMenu('index.php'); ?>