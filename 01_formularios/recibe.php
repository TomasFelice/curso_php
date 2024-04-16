<?php


if($_POST) {
    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'];
    $year = $_POST['year'];
    $terminos = $_POST['terminos'];
    echo 'Hola, ' . $nombre . ' eres ' . $sexo . ' naciste en ' . $year . ' aceptaste los terminos? ' . $terminos;
} else {
    header('Location: http://localhost/curso_php/01_formularios/');
}



?>