<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<?php
    $data = array();
	if(isset($_GET['tope']))
		$tope = $_GET['tope'];

	if (!empty($tope))
	{
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', 'Z#~W2xwamQ69jQq', 'marketzone');	

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= '{$tope}' AND eliminado=0") ) 
		{
			$row = $result->fetch_all(MYSQLI_ASSOC);
			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$result->free();
            
		}

            /** Se crea un arreglo con la estructura deseada */
        foreach($row as $num => $registro) {            // Se recorren tuplas
            foreach($registro as $key => $value) {      // Se recorren campos
                $data[$num][$key] = utf8_encode($value);
            }
        }

		$link->close();
	}
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h3>PRODUCTO</h3>

		<br/>
		
		<?php if( isset($row) ) : ?>

			<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Unidades</th>
					<th scope="col">Detalles</th>
					<th scope="col">Imagen</th>
					</tr>
				</thead>
				<tbody>
                    <?php for ($j = 0; $j < count($data); $j++){ ?>
					<tr>
						<th scope="data"><?= $data[$j]['id'] ?></th>
						<td><?= $data[$j]['nombre'] ?></td>
						<td><?= $data[$j]['marca'] ?></td>
						<td><?= $data[$j]['modelo'] ?></td>
						<td><?= $data[$j]['precio'] ?></td>
						<td><?= $data[$j]['unidades'] ?></td>
						<td><?= utf8_encode($data[$j]['detalles']) ?></td>
						<td><img src=<?= $data[$j]['imagen'] ?> ></td>
					</tr>

                    <?php
                        }
                    ?>
				</tbody>
			</table>

		<?php elseif(!empty($id)) : ?>

			 <script>
                alert('El ID del producto no existe');
             </script>

		<?php endif; ?>
	</body>
</html>