<?php

// Funciones para el blog

// filter_string_polyfill - Filtra una cadena de texto para evitar inyecciones de código
function filter_string_polyfill(string $string): string {
    $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
    return str_replace(["'", '"'], ['&#39;', '&#34;'], $str);
}

function db_connect(string $host, string $table, string $user, string $pass) : PDO|bool {
    try {
        $conn  = new PDO('mysql:host=' . $host . ';dbname=' . $table, $user, $pass);
        return $conn;
    } catch (PDOException $e) {
        return false;
    }
}

function clean_input(string $data) : string {
    // elminar espacios en blanco, barras invertidas, y caracteres especiales
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = filter_string_polyfill($data);
    return $data;
}

function getActualPage() : int {
    return isset($_GET['p']) ? (int)filter_var($_GET['p'], FILTER_SANITIZE_NUMBER_INT) : 1;
}

function get_posts(int $postPorPagina, PDO $conn) : array {
    $actualPage = getActualPage();
    $inicio = ($actualPage > 1) ? $actualPage * $postPorPagina - $postPorPagina : 0;

    $stmt = $conn->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM posts LIMIT '. $inicio .',' . $postPorPagina);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getCantPaginas(int $postPorPagina, PDO $conn) : int {
    $totalPosts = $conn->query('SELECT FOUND_ROWS() as total');
    $totalPosts = $totalPosts->fetch()['total'];

    return ceil($totalPosts / $postPorPagina);
}

function getPostByID(int $idPost, PDO $conn) : array|bool {
    $results = $conn->query('SELECT * FROM posts WHERE id = ' . $idPost . ' LIMIT 1');
    $results = $results->fetch();

    return ($results) ? $results : false;
}

function formatTimeStamp(string $date) : string {
    $timestamp = strtotime($date);

    $months = [
        'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
        'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    ];

    $day = date('d', $timestamp);
    $month = $months[date('n', $timestamp) - 1];
    $year = date('Y', $timestamp);

    return "$day de $month del $year";
}

function comprobarSession () {
    if (!isset($_SESSION['admin'])) {
        header('Location: ' . BASE_URL);
    }
}