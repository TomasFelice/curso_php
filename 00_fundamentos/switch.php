<?php

$mes = 'Enero';

switch($mes) {
    case 'Enero':
        echo 'Feliz año nuevo';
        break;
    case 'Dicembre':
        echo 'Feliz navidad';
        break;
    default:
        echo 'En este mes no hay festividades';
        break;
}

// hay una mejor opcion que switch -> match

$output = match($mes) {
    'Enero' => 'Feliz año nuevo',
    'Dicembre' => 'Feliz navidad',
    'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre' => 'En este mes no hay festividades',
    default => 'No es un mes'
};

$age = 18;
// podes hacer match con expresiones
$output1 = match(true) {
    $age < 18 => 'No podes pasar',
    $age >= 18 => 'Podes pasar',
    $mes == 'Enero' => 'Feliz año nuevo',
    $mes == 'Dicembre' => 'Feliz navidad',
    default => 'No es un mes ni un numero'
};

?>