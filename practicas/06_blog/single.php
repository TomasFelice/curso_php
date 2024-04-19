<?php

require 'admin/config.php';
require 'functions.php';

$conn = db_connect(BD_CONFIG['host'], BD_CONFIG['bd'], BD_CONFIG['user'], BD_CONFIG['pass']);
$idPost = (int)filter_var(clean_input($_GET['id']), FILTER_SANITIZE_NUMBER_INT);

if (!$conn) {
    header('Location: error.php');
}

if (empty($idPost)) {
    header('Location: index.php');
}

$post = getPostByID($idPost, $conn);

if(!$post) {
    header('Location: index.php');
}


require 'views/single.view.php';
