<?php

session_start();
session_destroy();
$_SESSION = [];

header('Location: login.php'); // Redirigimos al usuario a la página de login