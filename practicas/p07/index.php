<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>

    <form method="GET">
        <label for="form-valor1">Numero:</label><input type="number" name="numero"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    require_once('src/funciones.php');
    echo multiplo();
    ?>

    <h2>Ejercicio 2</h2>

    <p>Generación repetitiva de 3 números aleatorios</p>

    <?php
        include_once('src/funciones.php');
        aleatorio();
    ?>

    <h2>Ejercicio 3</h2>

    <p>número entero obtenido aleatoriamente, pero que además sea múltiplo de un número dado.</p>

    <form  method="GET">
        <label> Numero:</label><input type="number" name="dado"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        include_once('src/funciones.php');
        entero(0,15545);
    ?>

    <h2>Ejercicio 4</h2>
    <p>Tabla del alfabeto.</p>
    <?php
        include_once('src/funciones.php');
        letras();
    ?>


    <h2>Ejercicio 5</h2>
    <form method="post" action="src/respuesta6.php">
        Edad: <input type="number" name="edad"><br>
        Sexo: 
       <select name="sexo" size="1">
          <option value="M">Masculino</option>
          <option value="F">Femenino</option>
        </select>
        <br>
        <input value="Verificar" type="submit">
    </form>
    
</body>
</html>