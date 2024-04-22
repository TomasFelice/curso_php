<?php

require 'admin/config.php';
require 'functions.php';

$conn = db_connect(BD_CONFIG['host'], BD_CONFIG['bd'], BD_CONFIG['user'], BD_CONFIG['pass']);

if (!$conn) {
    header('Location: error.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['busqueda'])) {
    $search = clean_input($_GET['busqueda']);
    $stmt = $conn->prepare('SELECT * FROM posts WHERE titulo LIKE :busqueda OR texto LIKE :busqueda');
    $stmt->execute(['busqueda' => '%' . $search . '%']);
    $posts = $stmt->fetchAll();

    if(empty($posts)) {
        $titulo = 'No se encontraron resultados para la busqueda: ' . $search;
    } else {
        $titulo = 'Resultados de la busqueda: ' . $search;
    }
} else  {
    header('Location: ' . BASE_URL .  'index.php');
}

require 'views/buscar.view.php';

?>