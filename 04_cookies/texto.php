<?php

$tamano = $_COOKIE['font-size'] ?? '15px';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Texto</title>
    <STYle>
        p {
            font-size: <?= $tamano; ?>;
        }
    </STYle>
</head>
<body>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus harum eaque laborum, at dolor nulla totam mollitia numquam corporis. Quibusdam modi natus aut perspiciatis dolore. Similique temporibus ea impedit unde?</p>
</body>
</html>