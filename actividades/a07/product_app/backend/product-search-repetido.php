<?php
    use API\BACKEND\Products as DB;
    require_once __DIR__ . '/myapi/Products.php';
    $db1 = new DB();
    $db1->singleByName($_POST['search']);
    echo $db1->getData()
/*     include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['search']) ) {
        $search = $_POST['search'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        $sql = "SELECT * FROM productos WHERE  nombre = '{$search}' AND eliminado = 0";
        if ( $result = $conexion->query($sql) ) {
            // SE OBTIENEN LOS RESULTADOS
			$rows = $result->fetch_all(MYSQLI_ASSOC);
            $data['len'] = count($rows);
            
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($conexion));
        }
		$conexion->close();
    } 
        echo json_encode($data, JSON_PRETTY_PRINT); */
    
?>