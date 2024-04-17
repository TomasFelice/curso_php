<?php

// siempre que usemos sesiones, debemos iniciarlas
session_start();

// se destruye cuando el usuario cierra el navegador
$_SESSION['nombre'] = 'Tomas';

// si queremos que la sesión se guarde en la computadora del usuario
// debemos usar cookies



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
</head>
<body>
    <h1>Pagina de Inicio</h1>
    <p></p>
    <a href="pagina2.php">Ir a la página 2</a>
</body>
</html>