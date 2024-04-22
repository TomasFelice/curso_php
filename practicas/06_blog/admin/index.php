<?php
session_start();

// Index del admin

require 'config.php';
require '../functions.php';

comprobarSession();

$conn = db_connect(BD_CONFIG['host'], BD_CONFIG['bd'], BD_CONFIG['user'], BD_CONFIG['pass']);

if (!$conn) {
    header('Location: ../error.php');
}

$posts = get_posts(BLOG_CONFIG['post_por_pagina'], $conn);

if (!$posts) {
    header('Location: ../error.php');
}

require '../views/admin_index.view.php';