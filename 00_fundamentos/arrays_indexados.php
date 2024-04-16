<?php

// Arrays

// Arrays indexados
$daysOfWeek = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');

// Imprimir lunes
echo $daysOfWeek[0];

// Se puede hacer una especie de 'push' asi
$daysOfWeek[7] = 'Nuevo dia';

// o asi
$daysOfWeek[] = 'Nuevo dia 2';

foreach ($daysOfWeek as $day) {
    echo $day . '<br>';
}

// Tambien se puede declarar un array asi
$months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'];


?>