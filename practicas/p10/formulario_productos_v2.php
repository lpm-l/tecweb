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
				var correcto = true;
        if (document.getElementById('form-name').value.length > 100 || document.getElementById('form-name').value.length == 0){
          correcto = false;
          alert('Error en Nombre');
        }
        if (document.getElementById('form-model').value.length > 25 || !document.getElementById('form-model').value.match(/^[0-9a-zA-Z]+$/)){
          correcto=false;
          alert('Error en Modelo');
        }
        
        if (document.getElementById('form-precio').value < 99.99){
          correcto=false;
          alert('Error en Precio');
        }

        if (document.getElementById('form-precio').value == ''){
          correcto=false;
          alert('Error en Precio: No puede estar vacio');
        }

        if (document.getElementById('form-det').value.length > 250){
          correcto=false;
          alert('Error en Detalles: Demasiado largo');
        }


        if (document.getElementById('form-uni').value == ''){
          correcto=false;
          alert('Error en Unidades: No puede estar vacio');
        }

        if (document.getElementById('form-uni').value < 0){
          correcto=false;
          alert('Error en Unidades');
        }

        if (document.getElementById('form-img').value == ''){
          document.getElementById('form-img').value = "img/default.jpg"
        }


        
        if (correcto)
          alert('TODO BIEN')
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
          <li><label for="form-name">Nombre:</label> <input type="text" name="name" id="form-name" value="<?=!empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>"></li>
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