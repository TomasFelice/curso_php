<?php

$months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

$cantMonths = count($months);

$lastMonth = $months[$cantMonths - 1];
$numberOfLastMonth = $cantMonths;

echo "El ultimo mes es $lastMonth y es el mes numero $numberOfLastMonth y la cantidad de elementos del array es $cantMonths";
?>