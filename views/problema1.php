<?php

require_once 'controllers/Problema1Controller.php';
require_once 'utils/Navegacion.php';

$resultado = null;

if(isset($_POST['calcular']))
{
    $numeros = [];

    for($i=1; $i<=5; $i++)
    {
        $numeros[] = $_POST["n$i"];
    }

    $resultado = Problema1Controller::procesar($numeros);
}
?>

<h2>Problema 1</h2>

<form method="POST">

    <input type="number" name="n1" required>
    <input type="number" name="n2" required>
    <input type="number" name="n3" required>
    <input type="number" name="n4" required>
    <input type="number" name="n5" required>

    <button type="submit" name="calcular">
        Calcular
    </button>

</form>

<?php if($resultado): ?>

<div class="resultado">

    <p>Media: <?= number_format($resultado['media'],2) ?></p>

    <p>Desviación:
        <?= number_format($resultado['desviacion'],2) ?>
    </p>

    <p>Mínimo: <?= $resultado['minimo'] ?></p>

    <p>Máximo: <?= $resultado['maximo'] ?></p>

</div>

<?php endif; ?>

<?= Navegacion::volverMenu('index.php'); ?>