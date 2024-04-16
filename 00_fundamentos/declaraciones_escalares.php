<?php

// Declaraciones escalares
// A partir de PHP 7 podemos declarar el tipo de dato que se espera
// en los parametros y en el valor de retorno de una función

// si ponemos declare(strict_types=1); en la primera linea
// de nuestro archivo, todas las funciones de nuestro archivo
// tendrán que cumplir con las declaraciones escalares
declare(strict_types=1);

// podemos tipar los parametros de una función
// para que solo acepte un tipo de dato
function cuadrado(int $n) {
    return $n * $n;
}

$number = 5;
// si nos mandaran un string en ves de numero no haría lo esperado
echo 'El cuadrado de ' . $number . ' es ' . cuadrado($number) . '<br>';

// Podemos tipar el valor de retorno de una función
function cuadrado2(int $n): int {
    return $n * $n;
}

