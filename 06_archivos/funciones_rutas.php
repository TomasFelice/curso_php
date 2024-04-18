<?php

const FILE_NAME = 'carpeta/documento.txt';

// Ruta del archivo
echo pathinfo(FILE_NAME, PATHINFO_BASENAME) . '<br>';
// directorio del archivo
echo pathinfo(FILE_NAME, PATHINFO_DIRNAME) . '<br>';
// EXTENSION del archivo
echo pathinfo(FILE_NAME, PATHINFO_EXTENSION) . '<br>';
// NOMBRE del archivo
echo pathinfo(FILE_NAME, PATHINFO_FILENAME) . '<br>';

// devuelve los archivos que coincidan con el patron
$resultados = glob('*.php');
print_r($resultados);
// devuelve los archivos que coincidan con el patron pudiendo buscar por varias extensiones
$resultados = glob('*{.php,html,txt}', GLOB_BRACE);
print_r($resultados);

echo '<br>';

echo basename(FILE_NAME) . '<br>'; // devuelve SOLO el nombre del archivo
echo basename(FILE_NAME, '.txt') . '<br>'; // devuelve SOLO el nombre del archivo sin la extension si coincide con la que se le pasa
echo dirname(FILE_NAME) . '<br>'; // devuelve SOLO el directorio del archivo