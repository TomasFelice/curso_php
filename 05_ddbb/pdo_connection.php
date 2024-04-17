<?php

try {
    // CONEXION A LA BASE DE DATOS

    // PDO(ddbb, user, pass)
    $conn = new PDO('mysql:host=localhost;dbname=prueba', 'root', '');


    // SCRIPT PARA CREAR TABLA Y INSERTAR DATOS

    // $conn->query('CREATE TABLE IF NOT EXISTS usuarios(
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     email VARCHAR(100) NOT NULL,
    //     password VARCHAR(255) NOT NULL
    // )');

    // $users = [
    //     [
    //         'email' => 'tomas@gmail.com',
    //         'password' => '123456'
    //     ],
    //     [
    //         'email' => 'pepe@gmail.com',
    //         'password' => '1234567'
    //     ],
    //     [
    //         'email' => 'raul@gmail.com',
    //         'password' => '1234568'
    //     ],
    //     [
    //         'email' => 'anacleto@gmail.com',
    //         'password' => '1234569'
    //     ],
    //     [
    //         'email' => 'melek@gmail.com',
    //         'password' => '12345610'
    //     ],
    // ];

    // foreach ($users as $key => $user) {
    //     $sql = 'INSERT INTO usuarios (email, password) VALUES (:email, :password)';
    //     $stmt = $conn->prepare($sql);
    //     $stmt->execute($user);
    // }


    // METODO QUERY

    // Este metodo de query es util cuando sol consultas sencillas y no usemos variables en la consulta
    // pero no es recomendable cuando la query es un poco mas compleja
    // para ello hay que usar prepare y execute como hice arriba

    // $results = $conn->query('SELECT * FROM usuarios');

    // foreach ($results as $row) {
    //     echo $row['id'] . ' - ' . $row['email'] . '<br>';
    // }


    // PREPARED STATEMENTS

    $id = 5;
    $email = 'tomas@gmail.com';

    $stmt = $conn->prepare('SELECT * FROM usuarios WHERE id = :id OR email = :email');
    $stmt->execute(
        [
            ':id' => $id,
            ':email' => $email    
        ]
    );

    // fetch() devuelve un solo resultado
    // fetchAll() devuelve todos los resultados
    $results = $stmt->fetchAll();
    foreach ($results as $row) {
        echo $row['id'] . ' - ' . $row['email'] . '<br>';
    }


} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    die();
}