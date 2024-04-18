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

    // Recibimos los datos
    $usuario = filter_string_polyfill(strtolower($_POST['usuario']));
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password_repeat'];

    // Inicializamos los errores vacíos
    $errores = '';

    // Validamos los datos enviados
    if(empty($usuario) or empty($password) or empty($passwordRepeat)) {
        $errores .= '<li>Por favor rellena todos los datos correctamente</li>';
    } else {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=login_practica', 'root', '');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Buscamos si el usuario ya existe
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute([':usuario' => $usuario]);
        $resultado = $statement->fetch();

        if ($resultado != false) {
            $errores .= '<li>El nombre de usuario ya existe</li>';
        }

        // encriptando la password
        // sha 512 es un algoritmo de encriptación
        $password = hash('sha512', $password);
        $passwordRepeat = hash('sha512', $passwordRepeat);

        if ($password != $passwordRepeat) {
            $errores .= '<li>Las contraseñas no son iguales</li>';
        }
    }

    if($errores == '') {
        // insertamos el usuario en la DB
        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (null, :usuario, :pass)');
        $statement->execute([
            ':usuario' => $usuario,
            ':pass' => $password
        ]);

        header('Location: login.php');
    }
}


require 'views/registrate.view.php';