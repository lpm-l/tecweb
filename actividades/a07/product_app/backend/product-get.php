<?php
    use API\BACKEND\Products as DB;
    require_once __DIR__ . '/myapi/Products.php';
    $db1 = new DB();
    $db1->single();
    echo $db1->getData()
/*    include('database.php');

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['id']) ) {
        $id = $_POST['id'];
        $sql = "SELECT * from productos WHERE id = {$id}";
        if ( $result = $conexion->query($sql) ) {
            // SE OBTIENEN LOS RESULTADOS
            $rows = $result->fetch_array(MYSQLI_ASSOC);

            if(!is_null($rows)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach($rows as $key => $value) {
                    $data[$key] = utf8_encode($value);
                }
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($conexion));
        }
        $conexion->close();
    } 

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT); */


?>