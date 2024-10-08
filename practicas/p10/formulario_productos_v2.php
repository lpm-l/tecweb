<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" >
    <title>Registro al Concurso</title>
    <style type="text/css">
      ol, ul { 
      list-style-type: none;
      }
    </style>

    <script type="text/javascript">
      function verificarEntradas()
			{
        var name = document.getElementById('form-name').value;
        var marca = document.getElementById('marca').value;
        var modelo = document.getElementById('form-model').value;
        var precio = document.getElementById('form-precio').value; 
        var uni = document.getElementById('form-uni').value;
        var det = document.getElementById('form-det').value;
        var img = document.getElementById('form-img').value;
        var id = document.getElementById('form-id').value;

				var correcto = true;
        if (name.length > 100 || name.length == 0){
          correcto = false;
          alert('Error en Nombre');
        }
        if (modelo.length > 25 || !modelo.match(/^[0-9a-zA-Z]+$/)){
          correcto=false;
          alert('Error en Modelo');
        }
        
        if (precio < 99.99){
          correcto=false;
          alert('Error en Precio');
        }

        if (precio == ''){
          correcto=false;
          alert('Error en Precio: No puede estar vacio');
        }

        if (det.length > 250){
          correcto=false;
          alert('Error en Detalles: Demasiado largo');
        }


        if (uni == ''){
          correcto=false;
          alert('Error en Unidades: No puede estar vacio');
        }

        if (uni < 0){
          correcto=false;
          alert('Error en Unidades');
        }

        if (img == ''){
          img = "http://localhost/img/default.jpg";
        }


        
        if (correcto){
          alert('TODO BIEN');
          send2form(name , marca, modelo, precio, uni, det, img, id )
        }

			}
    </script>

    <script>
          function send2form(name , marca, modelo, precio, uni, det, img, id ) {
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
				//ID
				var idIn = document.createElement("input");
                idIn.type = 'text';
                idIn.name = 'id';
                idIn.value = id;
                form.appendChild(idIn); 


                form.method = 'POST';
                form.action = 'https://localhost/tecweb/practicas/p10/update_producto.php';  

                document.body.appendChild(form);
                form.submit();
            }
        </script>
  </head>

  <body>
    <h1>Registro de  productos</h1>

    <form id="formulatioProd" action="http://localhost/tecweb/practicas/p09/aa.php" method="post">

    <h2>Información del producto</h2>

      <fieldset>
        <legend>Producto</legend>

        <ul>
        <li><label for="form-name">ID:</label> <input type="text" name="idProd" id="form-id" value="<?=!empty($_POST['idProd'])?$_POST['idProd']:$_GET['idProd'] ?>" readonly /></li>
          <li><label for="form-name">Nombre:</label> <input type="text" name="name" id="form-name" value="<?=!empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>"/></li>
          <li><label for="form-marca">Marca:</label> <!--<input type="text" name="marca" id="form-marca"></li>-->   

          <select id="marca" >
            <option>Myethos</option>
            <option>Kotobukiya</option>
            <option>GSC</option>
            <option>Aniplex</option>
            <option>Max Factory</option>
          </select>       

           <li><label for="form-model">Modelo:</label> <input type="text" name="model" id="form-model" value="<?=!empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>"></li>
          <li><label for="form-det">Detalles:</label> <input type="text" name="deta" id="form-det" value="<?=!empty($_POST['det'])?$_POST['det']:$_GET['det'] ?>"></li>
          <li><label for="form-precio">Precio:</label> <input type="number" step="0.01" name="precio" id="form-precio" value="<?=!empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>"></li>
          <li><label for="form-uni">Unidades:</label> <input type="number"  name="uni" id="form-uni" value="<?=!empty($_POST['uni'])?$_POST['uni']:$_GET['uni'] ?>"></li>
          <li><label for="form-img">Imagen:</label> <input type="text" name="imgn" id="form-img" value="<?=!empty($_POST['img'])?$_POST['img']:$_GET['img'] ?>"></li>

        </ul>
      </fieldset>



      <p>
        <input type="button" value="Insertar Producto" onclick="verificarEntradas()">
        <input type="reset">
      </p>

    </form>
  </body>
</html>