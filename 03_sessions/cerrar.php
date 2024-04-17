<?php

session_start();

// si cerramos la sesión, se borra la variable de sesión
// esto tambien pasa cuando cerramos el navegador
session_destroy();