<?php

// error_reporting(0);
//header('Content-type: application/json; charset=utf-8');

function validarDatos (string $nombre, int $edad, string $pais, string $correo) : bool {
    if ($nombre == '') {
        return false;
    } elseif ($edad = 0) {
        return false;
    } elseif ($pais == '') {
        return false;
    } elseif ($correo == '' || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    return true;
}

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$pais = $_POST['pais'];
$correo = $_POST['correo'];

if(validarDatos($nombre, $edad, $pais, $correo)) {
    $conexion = new mysqli('localhost', 'root', '', 'ajax_php');
    $conexion->set_charset("utf8");

    if($conexion->connect_errno){
        $respuesta = [
            'error' => true
        ];
    } else {
        $statement = $conexion->prepare("INSERT INTO usuarios (nombre, edad, pais, correo) VALUES (?, ?, ?, ?)");
        $statement->bind_param('siss', $nombre, $edad, $pais, $correo);
        $statement->execute();

        if($conexion->affected_rows <= 0){
            $respuesta = [
                'error' => true
            ];
        } else {
            $respuesta = [];
        }
    }
}

echo json_encode($respuesta);