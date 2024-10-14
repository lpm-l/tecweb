<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);

        //Para mayor facilidad se pasan a variables
        $nombre = $jsonOBJ->nombre; 
        $marca  = $jsonOBJ->marca;
        $modelo = $jsonOBJ->modelo;
        $precio = $jsonOBJ->precio;
        $detalles = $jsonOBJ->detalles;
        $unidades = $jsonOBJ->unidades;
        $imagen   = $jsonOBJ->imagen;
        $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen)
        select '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}' 
        WHERE NOT EXISTS (SELECT 1 FROM productos WHERE nombre = '{$nombre}' AND marca = '{$marca}' AND modelo = '{$modelo}' AND eliminado = 0)";
        if ( $conexion->query($sql))
        {
            if ($conexion->insert_id == 0){
                echo "ERROR: Producto ya existe en la BD";
            }else{
                echo 'ÉXITO: Producto insertado con ID: '.$conexion->insert_id;
            }
        }
        else
        {
            echo 'ERROR: El Producto no pudo ser insertado =(';
        }
    }
?>