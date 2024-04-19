<?php

function filter_string_polyfill(string $string): string {
    $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
    return str_replace(["'", '"'], ['&#39;', '&#34;'], $str);
}

function db_connect(string $host, string $table, string $user, string $pass) {
    try {
        $conn  = new PDO("mysql:host=$host;dbname=$table", $user, $pass);
        return $conn;
    } catch (PDOException $e) {
        return false;
    }
}