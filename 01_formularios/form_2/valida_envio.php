<?php

// Problemas de esta manera:
// 1. No sabemos desde qué formulario viene la petición.

// si solo hay un formulario en elarchivo es recomendable la primer forma

// $_SERVER['REQUEST_METHOD'] devuelve el método de envío de la petición
// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//     echo 'Se enviaron por GET';
// } else {
//     echo 'Se enviaron por POST';
// }

// hay otra forma de recibir una petición
// con esta forma sabemos desde qué formulario viene la petición
if(isset($_POST['submit'])) {
    echo 'Se han enviado los datos correctamente';
    echo '<br>';
    echo $_POST['nombre'];
    echo '<br>';
    echo $_POST['correo'];
} else {
    echo 'No se han enviado los datos';
}

?>