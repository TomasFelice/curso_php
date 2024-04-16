<?php

$months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

// ordena el array de forma alfabetica
sort($months);

// ordena el array de forma inversa
rsort($months);

// ordena el array de forma alfabetica sin importar mayusculas
natcasesort($months);

// si fuesen numeros se ordenarian de forma numerica
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
        <?php foreach ($months as $month): ?>
            <?= '<li>' . $month . '</li>'; ?>
        <?php endforeach; ?>
    </ul>
</body>
</html>