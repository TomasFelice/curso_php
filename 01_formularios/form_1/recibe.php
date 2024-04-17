<?php


// if($_POST) {
//     $nombre = $_POST['nombre'];
//     $sexo = $_POST['sexo'];
//     $year = $_POST['year'];
//     $terminos = $_POST['terminos'];
//     echo 'Hola, ' . $nombre . ' eres ' . $sexo . ' naciste en ' . $year . ' aceptaste los terminos? ' . $terminos;
// } else {
//     header('Location: http://localhost/curso_php/01_formularios/');
// }

// NUNCA USAR GET PARA ENVIAR INFORMACION SENSIBLE

if(!$_GET) {
    header('Location: http://localhost/curso_php/01_formularios/');
}

$nombre = $_GET['nombre'];
$sexo = $_GET['sexo'];
$year = $_GET['year'];
$terminos = $_GET['terminos'];

echo $nombre . '<br>';
echo $sexo . '<br>';
echo $year . '<br>';
echo $terminos . '<br>';

?>