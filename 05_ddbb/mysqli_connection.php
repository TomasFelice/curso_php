<?php
// CONEXION A LA BASE DE DATOS

// mysqli(host, user, pass, ddbb)
$conn = new mysqli('localhost', 'root', '', 'prueba');

if ($conn->connect_errno) {
    die('Error en la conexión');
}else {
    // OBTENER DATOS DE LA DB
    
    // $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
    // $sql = 'SELECT * FROM usuarios WHERE id = ' . $id . ' ORDER BY id DESC';
    // $results = $conn->query($sql);

    // if($results->num_rows) {
    //     // fetch_assoc() devuelve un array asociativo con los datos de la fila (1 sola fila)
    //     // si no hay resultados, devuelve null
    //     // $results->fetch_assoc();

    //     while($row = $results->fetch_assoc()) {
    //         echo $row['id'] . ' - ' . $row['email'] . '<br>';
    //     }
    // } else {
    //     echo 'No hay resultados';
    // }

    // INSERTAR VALORES EN LA DB
    // $sql = "INSERT INTO usuarios (email, password) VALUES ('cactus@gmail.com', 'cleto1234')";
    // $conn->query($sql);
    // echo 'filas agregadas: ' . $conn->affected_rows ?? 0;

    // AHORA CON PREPARE STATEMENTS
    $stmt = $conn->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
    // s -> string, i -> integer, d -> double, b -> blob
    $stmt->bind_param('ss', $email, $password);

    if (isset($_GET['email']) && isset($_GET['password'])) {
        $email = $_GET['email'];
        $password = $_GET['password'];
        $stmt->execute();
        echo 'filas agregadas: ' . $conn->affected_rows ?? 0;
    }

}