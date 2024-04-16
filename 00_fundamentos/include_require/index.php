<?php

function sumar($a, $b) {
    return $a + $b;
}

// con un include solo tira un warning si no encuentra el archivo
include 'index.view.php';

// con un require tira un error fatal si no encuentra el archivo
// require 'index.view.php';

// include_once y require_once se usan para incluir un archivo solo una vez
?>
