<?php

require 'constantes.php';
require 'funciones.php';

const FOTOS_POR_PAGINA = 8;

$paginaActual = (isset($_GET['p']) ? (int)$_GET['p'] : 1);
// Es lo mismo que usar el ?? -> probar
// $paginaActual = (int)$_GET['p'] ?? 1; -> NO, TIRA WARNING

// Configuramos el inicio de cada pagina
$inicio = ($paginaActual > 1) ? ($paginaActual * FOTOS_POR_PAGINA - FOTOS_POR_PAGINA) : 0;

// Conectar a la base de datos
$conn = db_connect(HOST_DB, GALERIA_DB, USUARIO_DB, PASS_DB);

if (!$conn) {
    die('Error de conexión a la base de datos');
}

// Obtenemos las fotos de la base de datos
// SQL_CALC_FOUND_ROWS es una función de MySQL que nos permite obtener el total de filas sin tener que hacer una segunda consulta
$stmt = $conn->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM " . FOTOS_TABLE . " LIMIT $inicio, " . FOTOS_POR_PAGINA);

$stmt->execute();
$fotos = $stmt->fetchAll();

if (!$fotos) {
    header('Location: index.php');
}

// Obtenemos el total de fotos
$stmt = $conn->prepare("SELECT FOUND_ROWS() as total_fotos");
$stmt->execute();
$totalFotos = $stmt->fetch()['total_fotos'];


$totalPaginas = ceil($totalFotos / FOTOS_POR_PAGINA);

require 'views/index.view.php';