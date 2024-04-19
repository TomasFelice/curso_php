<?php

require 'constantes.php';
require 'funciones.php';

$conn = db_connect(HOST_DB, GALERIA_DB, USUARIO_DB, PASS_DB);

if (!$conn) {
    die();
}

// $_FILES is a superglobal variable that holds information about files uploaded via HTTP POST
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {

    // tmp_name es donde se guarda la imagen temporalmente cuando es subida
    // el @ se usa para que no muestre errores de tipo NOTICE
    $check = @getimagesize($_FILES['foto']['tmp_name']);

    if($check !== false) {
        $archivo_subido = CARPETA_FOTOS . $_FILES['foto']['name'];
        echo $archivo_subido;

        // Mover archivo
        // move_uploaded_file( origen , destino );
        move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);

        // Inserto la foto en la DB
        $stmt = $conn->prepare('
            INSERT INTO ' . FOTOS_TABLE . ' (titulo, url, texto)
            VALUES (:titulo, :url, :texto)
        ');

        // Nota: no se necesita la URL, solo usamos el nombre del archivo
        $stmt->execute([
            ':titulo' => filter_string_polyfill($_POST['titulo']),
            ':url' => $_FILES['foto']['name'],
            ':texto' => filter_string_polyfill($_POST['texto'])
        ]);

        // Redirijo al index
        header('Location: index.php');
    } else {
        $error = 'El archivo no es una imagen o el archivo es muy pesado';
    }
 }

require 'views/subir.view.php';