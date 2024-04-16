<?php

// string
$name = "Tomas";

// int
$age = 21;  

// double : indicando un numero con decimales
// lo interpreta como double
$my_double = 1.5;

// boolean
$my_bool = false;

// Array
// Object
// Class
// Null

// con comillas dobles podemos interpolar variables
// con comillas simples no se interpola
// Se puede concatenar usando .
// Es más seguro utilizar comillas simples
echo "Hola soy $name y tengo $age años de edad. Usando comillas dobles";
echo "<br>";
echo 'Hola soy '. $name. ' y tengo '. $age .' años de edad. Usando comillas simples';


?>