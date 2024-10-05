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

		<script>
            function show() {
                // se obtiene el id de la fila donde está el botón presinado
                var rowId = event.target.parentNode.parentNode.id;

                // se obtienen los datos de la fila en forma de arreglo
                var data = document.getElementById(rowId).querySelectorAll(".row-data");

                var name = data[0].innerHTML;
				var marca = data[1].innerHTML;
				var modelo = data[2].innerHTML;
				var precio = data[3].innerHTML;
				var uni = data[4].innerHTML;
				var det = data[5].innerHTML;
				var img = data[6].innerHTML;
				var pp = "\"";
				var temp = img.substring(img.indexOf(pp)+1)
				img = temp.substring(0,temp.indexOf(pp))




                alert("Name: " + name + "\nMarca: " + marca + "\nModelo: " + modelo+ "\nPrecio: " + precio);

                send2form(name, marca, modelo, precio, uni, det, img)
            }
        </script>


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
					<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
                    <?php for ($j = 0; $j < count($data); $j++){ ?>
					<tr id="<?= $data[$j]['id'] ?>">
						<th scope="row"><?= $data[$j]['id'] ?></th>
						<td class="row-data"><?= $data[$j]['nombre'] ?></td>
						<td class="row-data"><?= $data[$j]['marca'] ?></td>
						<td class="row-data"><?= $data[$j]['modelo'] ?></td>
						<td class="row-data"><?= $data[$j]['precio'] ?></td>
						<td class="row-data"><?= $data[$j]['unidades'] ?></td>
						<td class="row-data"><?= utf8_encode($data[$j]['detalles']) ?></td>
						<td class="row-data"><img src=<?= $data[$j]['imagen'] ?> style="max-width: 300px; max-height: 300px;" ></td>
						<td>
							<input type="button" 
                            value="Modificar Producto" 
                            onclick="show()" />
						</td>
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

		<script>
            function send2form(name, marca, modelo, precio, uni, det, img) {
                var form = document.createElement("form");

				//Nombre
                var nombreIn = document.createElement("input");
                nombreIn.type = 'text';
                nombreIn.name = 'nombre';
                nombreIn.value = name;
                form.appendChild(nombreIn);

				//Marca
				var marcaIn = document.createElement("input");
                marcaIn.type = 'text';
                marcaIn.name = 'marca';
                marcaIn.value = marca;
                form.appendChild(marcaIn);

				//Modelo
				var modeloIn = document.createElement("input");
                modeloIn.type = 'text';
                modeloIn.name = 'modelo';
                modeloIn.value = modelo;
                form.appendChild(modeloIn);

				//Precio
				var precioIn = document.createElement("input");
                precioIn.type = 'number';
                precioIn.name = 'precio';
                precioIn.value = precio;
                form.appendChild(precioIn);

				//unidades
				var unidaIn = document.createElement("input");
                unidaIn.type = 'number';
                unidaIn.name = 'uni';
                unidaIn.value = uni;
                form.appendChild(unidaIn);

				//detalles
				var detaIn = document.createElement("input");
                detaIn.type = 'text';
                detaIn.name = 'det';
                detaIn.value = det;
                form.appendChild(detaIn);

				//imagen
				var imgIn = document.createElement("input");
                imgIn.type = 'text';
                imgIn.name = 'img';
                imgIn.value = img;
                form.appendChild(imgIn);

                console.log(form);

                form.method = 'POST';
                form.action = 'https://localhost/tecweb/practicas/p10/formulario_productos_v2.php';  

                document.body.appendChild(form);
                form.submit();
            }
        </script>
	</body>
</html>