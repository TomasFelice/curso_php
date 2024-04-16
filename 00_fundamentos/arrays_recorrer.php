<?php

$months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

$person = [
    'name' => 'Juan',
    'age' => 30,
    'country' => 'Argentina'
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recorrer Arrays</title>
</head>
<body>
    <h1>Meses del año</h1>
    <ul>
        <?php
            foreach ($months as $month) {
                echo '<li>' . $month . '</li>';
            }
        ?>
    </ul>

    <!-- De esta otra forma podemos acortar
    la sintaxis de un foreach y un php echo -->
    <h1>Foreach y echo acortado</h1>
    <ul>
        <?php foreach ($months as $month): ?>
            <?= '<li>' . $month . '</li>'; ?>
        <?php endforeach; ?>
    </ul>

    <!-- Recorrer un array asociativo -->
    <h1>Recorrer un array asociativo</h1>
    <ul>
        <?php foreach ($person as $key => $value): ?>
            <?= '<li>' . $key . ': ' . $value . '</li>'; ?>
        <?php endforeach; ?>
</body>
</html>