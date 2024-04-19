<?php

require 'constantes.php';
require 'funciones.php';

$conn = db_connect(HOST_DB, GALERIA_DB, USUARIO_DB, PASS_DB);

if (!$conn) {
    die('Error de conexión a la base de datos');
}

$id = (isset($_GET['id']) ? (int)$_GET['id'] : false);

if(!$id) {
    header('Location: index.php');
}

$stmt = $conn->prepare("SELECT * FROM " . FOTOS_TABLE . " WHERE id = :id");
$stmt->execute([':id' => $id]);
$foto = $stmt->fetch();

if (!$foto) {
    header('Location: index.php');
}

require 'views/foto.view.php';