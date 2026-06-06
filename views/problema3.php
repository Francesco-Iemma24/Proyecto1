<?php

require_once 'controllers/Problema3Controller.php';
require_once 'utils/Navegacion.php';

$resultado = [];

if(isset($_POST['calcular']))
{
    $n = $_POST['cantidad'];

    $resultado = Problema3Controller::procesar($n);
}
?>

<h2>Problema 3</h2>

<form method="POST">

    <input
        type="number"
        name="cantidad"
        placeholder="Ingrese N"
        required>

    <button type="submit" name="calcular">
        Generar
    </button>

</form>

<?php if(!empty($resultado)): ?>

<div class="resultado">

    <ul>

    <?php foreach($resultado as $multiplo): ?>

        <li><?= $multiplo ?></li>

    <?php endforeach; ?>

    </ul>

</div>

<?php endif; ?>

<?= Navegacion::volverMenu('index.php'); ?>