<?php

$text = 'Carlos';
$number = 10;
$number2 = 20;
$array = ['Carlos', 'Cristian', 'Tomas', 'Juan', 'Pedro'];
$arrayAsociativo = array(
    'name' => 'Tomas',
    'age' => 21,
    'country' => 'Argentina'
);
$boolean = true;

// funcion var_dump() nos indica el tipo de dato y su valor
var_dump($text);
echo '<br>';
// print_r() nos muestra el contenido de un array
// si es un booleano muestra 1 si es true, y nada si es false
print_r($array);
echo '<br>';
// funciones propias

function saludar($nombre)  {
    echo 'Hola, ' . $nombre . '<br>';
}

saludar('Tomi');

function sumar($num1, $num2) {
    return $num1 + $num2;
}

echo sumar(1,2) . '<br>';
echo sumar(1,10) . '<br>';
echo sumar(15,3) . '<br>';

function areaTriangulo($base, $altura) {
    return ($base*$altura)/2;
}

echo 'El area del triangulo es: ' . areaTriangulo(10, 5) . '<br>';

// funciones de strings
$texto = '        ijdoiwsoiw < > & "" hdiuehdied    ';

echo htmlspecialchars($texto) . '<br>';
echo trim($texto) . '<br>';
echo strlen($texto) . '<br>';
echo substr(trim($texto), 0, 3) . '<br>';
echo strtolower($texto) . '<br>';
echo strtoupper($texto) . '<br>';
echo strpos($texto, 'o') . '<br>';

// funciones de arrays
echo '<br>';
// extrae los elementos de un array
extract($arrayAsociativo);

echo $name . '<br>';

//array_pop() - extrae el ultimo elemento de un array y lo devuelve
echo array_pop($array) . '<br>';

//join() - une los elementos de un array en un string
echo join(' - ', $array) . '<br>';

// funciones matematicas
echo '<br>';

$numero = 10.2314251;
// redondea un numero decimal
echo round($numero) . '<br>';
// redondea un numero decimal hacia arriba
echo ceil($numero) . '<br>';
// redondea un numero decimal hacia abajo
echo floor($numero) . '<br>';
// redondea un numero decimal con decimales especificos
echo round($numero, 3) . '<br>';
// numero random entre limites
echo rand(1, 10) . '<br>';

echo M_PI . '<br>';

?>