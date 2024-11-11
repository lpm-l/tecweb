<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        'Z#~W2xwamQ69jQq',
        'marketzone'
    );


    if(!$conexion) {
        die('¡Base de datos NO conextada!');
    }
?>