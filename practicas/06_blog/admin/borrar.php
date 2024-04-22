<?php
session_start();

require 'config.php';
require '../functions.php';

comprobarSession();

$conn = db_connect(BD_CONFIG['host'], BD_CONFIG['bd'], BD_CONFIG['user'], BD_CONFIG['pass']);

if (!$conn) {
    header('Location: ../error.php');
}

$id = clean_input($_GET['id']);

if (!$id) {
    header('Location: ' . BASE_URL . 'admin');
}

$statement = $conn->prepare('DELETE FROM posts WHERE id = :id');
$statement->execute([':id' => $id]);

header('Location: ' . BASE_URL . 'admin');