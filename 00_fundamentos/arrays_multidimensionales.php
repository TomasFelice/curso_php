<?php

$friends = [
    ['Alejandro', 21],
    ['Julian', 22],
    ['Ricardo', 23]
];

// Si quiero acceder a Alejandro
echo $friends[0][0] . '<br>';
// Si quiero acceder a la edad Alejandro

echo $friends[0][1] . '<br>';
// Si quiero acceder a Julian
echo $friends[1][0] . '<br>';
// Si quiero acceder a la edad Julian

echo $friends[1][1] . '<br>';
// Si quiero acceder a Ricardo
echo $friends[2][0] . '<br>';
// Si quiero acceder a la edad Ricardo
echo $friends[2][1] . '<br>';

?>