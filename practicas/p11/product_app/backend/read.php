<?php

    function sql($query, $data){
        include_once __DIR__.'/database.php';

        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        echo "SELECT * FROM productos WHERE {$query}";
        if ( $result = $conexion->query("SELECT * FROM productos WHERE {$query}") ) {
            // SE OBTIENEN LOS RESULTADOS
			$row = $result->fetch_all(MYSQLI_ASSOC);

            if(!is_null($row)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                /** Se crea un arreglo con la estructura deseada */
                foreach($row as $num => $registro) {            // Se recorren tuplas
                    foreach($registro as $key => $value) {      // Se recorren campos
                        $data[$num][$key] = utf8_encode($value);
            }
        }
            }
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($conexion));
        }
		$conexion->close();

        return $data;
    }

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['test']) && $_POST['test']!= '') {
        echo "POR ID\n\n";
        $id = $_POST['test'];
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $detalles = $_POST['detalles'];
        $data = sql("id = '{$id}' AND nombre like '%{$nombre}%' AND marca like '%{$marca}%' AND detalles like '%{$detalles}%'", $data);
    
    }elseif ((isset($_POST['nombre']) && isset($_POST['detalles']) && isset($_POST['marca'])) && ($_POST['nombre'] != '' || $_POST['detalles'] != '' || $_POST['marca'] != '')){
        //echo "OTROS";
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $detalles = $_POST['detalles'];
        $data = sql("nombre like '%{$nombre}%' AND marca like '%{$marca}%' AND detalles like '%{$detalles}%'", $data);
        
    }
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>


