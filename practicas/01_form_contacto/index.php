<?php


function filter_string_polyfill(string $string): string {
    $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
    return str_replace(["'", '"'], ['&#39;', '&#34;'], $str);
}

$errores  = '';
$enviado  = false;

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];
    
    if (!empty($nombre)) {
        $nombre = trim($nombre);
        $nombre = filter_string_polyfill($nombre);
    } else {
        $errores .= 'Por favor ingresa un nombre <br>';
    }

    if (!empty($correo)) {
        $correo = trim($correo);
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores .= 'Por favor ingresa un correo válido <br>';
        }
    } else {
        $errores .= 'Por favor ingresa un correo <br>';
    }

    if(!empty($mensaje)) {
        $mensaje = htmlspecialchars($mensaje);
        $mensaje = trim($mensaje);
        $mensaje = stripslashes($mensaje);
    } else {
        $errores .= 'Por favor ingresa un mensaje <br>';
    }

    if(!$errores) {
        $enviar_a = 'tfelice.quinttos@gmail.com';
        $asunto = 'Correo enviado desde miPagina.com';
        $mensaje_preparado = "De: $nombre \n";
        $mensaje_preparado .= "Correo: $correo \n";
        $mensaje_preparado .= "Mensaje: " . $mensaje;

        // esta funcion envia un mail - no funciona con xampp
        if(mail($enviar_a, $asunto, $mensaje_preparado)) {
            $enviado = true;
        } else {
            $errores .= 'El correo no pudo ser enviado <br>';
        }
    }
}


require 'index.view.php';