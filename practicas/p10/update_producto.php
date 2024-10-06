<?php
    foreach ($_POST as $key => $value) {
        echo "$key: $value<br>";
    }

    /* MySQL Conexion*/
    $link = mysqli_connect('localhost', 'root', 'Z#~W2xwamQ69jQq', 'marketzone');
        // Chequea coneccion
    
    if($link === false){
        die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
    }
    
        // Ejecuta la actualizacion del registro
    $sql = "UPDATE productos SET  nombre = '{$_POST['nombre']}' , marca = '{$_POST['marca']}' , modelo = '{$_POST['modelo']}', precio = {$_POST['precio']}, detalles = '{$_POST['det']}', unidades = {$_POST['uni']}, imagen = '{$_POST['img']}' WHERE id= {$_POST['id']} ";
    
    if(mysqli_query($link, $sql)){
        echo "Registro actualizado.";
    } else {
        echo "ERROR: No se ejecuto $sql. " . mysqli_error($link);
    }
    
        // Cierra la conexion
    mysqli_close($link);

    

?> 