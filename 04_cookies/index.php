<?php

// esto usualmente se obtiene dinamicamente desde el usuario
// time() devuelve el tiempo actual+
// time() + 60 * 60 * 24 * 365 = 1 año
setcookie('font-size', '50px', time() + 60 * 60 * 24 * 365, '/' /* dominio en el cual estará disp */);

// en las cookies solo se pueden almacenar 4mb de texto
// se pueden almacenar 20 cookies por dominio
// se pueden almacenar 300 cookies en total

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galletitas 🍪</title>
</head>
<body>
    <h1>Cookie Seteada</h1>
</body>
</html>