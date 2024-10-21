<?php

  include('database.php');

    
    $producto = file_get_contents('php://input');
    $data = array(
        'status'  => 'error',
        'message' => 'Ya existe un producto con ese nombre');

    if(!empty($producto)) {
        $jsonOBJ = json_decode($producto);

        $sql = "UPDATE productos SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}', modelo = '{$jsonOBJ->modelo}', precio = {$jsonOBJ->precio}, detalles = '{$jsonOBJ->detalles}', unidades = {$jsonOBJ->unidades}, imagen = '{$jsonOBJ->imagen}' WHERE id = $jsonOBJ->id";
        $result =  $conexion->query($sql);

        if($conexion->query($sql)){
            $data['status'] =  "success";
            $data['message'] =  "Producto modificado";
        } else {
            $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
        }
        // Cierra la conexion
        $conexion->close();

    }
    echo json_encode($data, JSON_PRETTY_PRINT);

?>