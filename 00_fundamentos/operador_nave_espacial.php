<?php

// 1 si el primer operando es mayor que el segundo
// 0 si ambos operandos son iguales
// -1 si el primer operando es menor que el segundo

echo 'Operador nave espacial <=>' . '<br>';
echo 1 <=> 1;
echo '<br>'; // 0
echo 1 <=> 0;
echo '<br>'; // 1
echo 1 <=> 2;
echo '<br>'; // -1

// llevandolo a un caso real

$array = [3, 1, 2, 4];
function comparar($a, $b) {
    return $a <=> $b;
}
// usort permite enviar una funcion de comparacion
usort($array, 'comparar');

// implode junta los elementos de un array separados por un caracter
echo implode(', ', $array) . '<br>';
