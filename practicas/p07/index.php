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

    <?php
        include_once('src/funciones.php');
        aleatorio();
    ?>

    <h2>Ejemplo Tres</h2>

    <form  method="GET">
        <label for="form-valor1">Numero:</label><input type="number" name="dado"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        include_once('src/funciones.php');
        entero(0,15545);
    ?>





    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>
</body>
</html>