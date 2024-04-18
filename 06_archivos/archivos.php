<?php

const FILE_NAME = 'documento.txt';

if(file_exists(FILE_NAME)) {
    echo "El archivo existe";
} else {
    echo "El archivo no existe";
}

echo "<br>";
// echo file_get_contents(FILE_NAME);
// HAciendolo de esta manera, sobreescribe el archivo
// file_put_contents(FILE_NAME, "Hola Pepe \n"); 

// // De esta manera lo agrega
// file_put_contents(FILE_NAME, "Hola Pepe Agregado \n", FILE_APPEND); 
// echo file_get_contents(FILE_NAME);

// file_put_contents(FILE_NAME, '');
// for($i = 1; $i <= 10; $i++) {
//     file_put_contents(FILE_NAME, "$i \n", FILE_APPEND); 
// }

// Levantar archivo como array
$file = file(FILE_NAME);
print_r($file);