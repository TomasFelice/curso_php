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
    $id = clean_input($_POST['id']);
    $titulo = clean_input($_POST['titulo']);
    $extracto = clean_input($_POST['extracto']);
    $texto = $_POST['texto'];
    $thumbGuardada = $_POST['thumb-guardada'];
    $thumb = $_FILES['thumb'];

    if (empty($thumb['tmp_name'])) {
        $thumb = $thumbGuardada;
    } else {
        $archivoSubido = '../' . BLOG_CONFIG['carpeta_imagenes'] . $_FILES['thumb']['name'];
        move_uploaded_file($_FILES['thumb']['tmp_name'], $archivoSubido);
        
        $thumb = $_FILES['thumb']['name'];
    }


    $stmt = $conn->prepare('UPDATE posts SET titulo = :titulo, extracto = :extracto, texto = :texto, thumb = :thumb WHERE id = :id');

    $stmt->execute(
        [':titulo' => $titulo, 
        ':extracto' => $extracto, 
        ':texto' => $texto, 
        ':thumb' => $thumb, 
        ':id' => $id]
    );

    header('Location: ' . BASE_URL . 'admin');
} else {
    $idArticulo = clean_input($_GET['id']);

    if (empty($idArticulo)) {
        header('Location: ' . BASE_URL . 'admin');
    }

    $post = getPostByID($idArticulo, $conn);

    if (!$post) {
        header('Location: ' . BASE_URL . 'admin');
    }
}


require '../views/editar.view.php';