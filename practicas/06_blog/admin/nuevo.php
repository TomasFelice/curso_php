<?php
session_start();

require 'config.php';
require '../functions.php';

comprobarSession();

$conn = db_connect(BD_CONFIG['host'], BD_CONFIG['bd'], BD_CONFIG['user'], BD_CONFIG['pass']);

if (!$conn) {
    header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = clean_input($_POST['titulo']);
    $extracto = clean_input($_POST['extracto']);
    $texto = $_POST['texto'];
    $thumb = $_FILES['thumb']['tmp_name'];

    $archivoSubido = '../' . BLOG_CONFIG['carpeta_imagenes'] . $thumb;

    move_uploaded_file($thumb, $archivoSubido);

    $stmt = $conn->prepare('INSERT INTO posts (id, titulo, extracto, texto, thumb) VALUES (null, :titulo, :extracto, :texto, :thumb)');

    $stmt->execute([':titulo' => $titulo, ':extracto' => $extracto, ':texto' => $texto, ':thumb' => $thumb]);

    header('Location: ' . BASE_URL . 'admin');
}


require '../views/nuevo.view.php';