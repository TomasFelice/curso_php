<?php

try {
    $conn = new PDO('mysql:host=localhost;dbname=paginacion_practica', 'root', '');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

const POSTS_POR_PAGINA = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

$inicio = ($pagina > 1) ? ($pagina * POSTS_POR_PAGINA - POSTS_POR_PAGINA) : 0;

// SQL_CALC_FOUND_ROWS -> Sirve para contar el total de registros que hay en la tabla
$articulos = $conn->prepare(
    '   SELECT SQL_CALC_FOUND_ROWS * FROM articulo
        LIMIT ' . $inicio . ', ' . POSTS_POR_PAGINA
);

$articulos->execute();
$articulos = $articulos->fetchAll();

if(!$articulos) {
    header('Location: index.php');
}

// fetchColumn() en este caso es lo mismo que fetch()['total']
$totalArticuos = $conn->query('SELECT FOUND_ROWS() as total')->fetchColumn();

$numeroPaginas = ceil($totalArticuos / POSTS_POR_PAGINA);

require 'index.view.php';