<?php

session_start();

require 'admin/config.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = clean_input($_POST['usuario']);
    $password = clean_input($_POST['password']);

    if ($usuario == BLOG_ADMIN['usuario'] && $password == BLOG_ADMIN['password']) {
        $_SESSION['admin'] = $usuario;
        header('Location: ' . BASE_URL . 'admin');
    }

    $conn = db_connect(BLOG_CONFIG['db']['host'], BLOG_CONFIG['db']['table'], BLOG_CONFIG['db']['user'], BLOG_CONFIG['db']['pass']);

    $stmt = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password');
    $stmt->execute(['usuario' => $usuario, 'password' => $password]);

    $resultado = $stmt->fetch();

    if ($resultado !== false) {
        $_SESSION['usuario'] = $usuario;
        header('Location: ' . BASE_URL . 'admin');
    }
}


require 'views/login.view.php';
