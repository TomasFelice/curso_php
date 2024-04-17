<?php

// el operador de fusion de null es ??
// se usa para asignar un valor por defecto a una variable
// si esta no tiene valor

// previamente se hacía con un isset y una ternaria
// $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 'Anónimo';
$nombre = trim($_GET['nombre']) ?? 'Anónimo';

echo $nombre;

