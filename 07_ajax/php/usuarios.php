<?php

header('Content-Type: application/json; charset=utf-8');

$respuesta = [
    [
        '_id' => 1,
        'nombre' => 'Juan',
        'apellido' => 'Perez',
        'edad' => 30,
        'pais' => 'Argentina',
        'correo' => 'juan.perez@gmail.com'
    ],
    [
        '_id' => 2,
        'nombre' => 'Pedro',
        'apellido' => 'Gomez',
        'edad' => 25,
        'pais' => 'Uruguay',
        'correo' => 'pedro.gomez@gmail.com'
    ],
    [
        '_id' => 3,
        'nombre' => 'Ana',
        'apellido' => 'Fernandez',
        'edad' => 35,
        'pais' => 'Brasil',
        'correo' => 'ana.fernandez@gmail.com'
    ]
];

echo json_encode($respuesta);