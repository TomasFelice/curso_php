<?php

session_start();

function filter_string_polyfill(string $string): string {
    $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
    return str_replace(["'", '"'], ['&#39;', '&#34;'], $str);
}

if(isset($_SESSION['usuario'])){
    header('Location: index.php');
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibo los datos
    $usuario = filter_string_polyfill(strtolower($_POST['usuario']));
    $password = $_POST['password'];
    
    // Hasheo la pass
    $password = hash('sha512', $password);

    // Inicializo los errores vacíos
    $errores = '';

    // Nos conectamos a la DB
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=login_practica', 'root', '');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Ejecutamos la consulta del usuario
    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :pass LIMIT 1');
    $statement->execute([
        ':usuario' => $usuario,
        ':pass' => $password
    ]);
    $resultado = $statement->fetch();

    if (!$resultado) {
        $errores .= '<li>Usuario o contraseña incorrectos</li>';
    } else {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    }
}

require 'views/login.view.php';