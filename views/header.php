<?php require_once 'utils/Navegacion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Proyecto PHP</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body>

<header>
    <div class="header-badge">Desarrollo de Software VII</div>
    <h1>Mini Proyecto PHP</h1>
</header>

<?php if (isset($_GET['problema']) && $_GET['problema'] !== ''): ?>
<nav class="subnav">
    <?= Navegacion::volverMenu('index.php') ?>
</nav>
<?php endif; ?>
 