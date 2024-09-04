<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>P05</title>
</head>
<body>
    <?php
    echo "<h2>Pregunta 1</h2>";
    echo "<p>".'Variables válidas: $_myvar, $_7var, $myvar, $var7, $_element1'."<br>";
    echo 'Estas variables son válidas ya que todas empiezan con letras o guion bajo'."<br>";
    echo 'Variables inválidas: myvar, $house*5'."<br>";
    echo "Estas variables no son válidas ya que tiene que iniciar con $, y no puede tener carácteres tales como * o /</p>"

    echo "<br><h2>Pregunta 2</h2>";

    #asignación de variables

    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;

    echo "Los valores de las variables son:<br>";
    echo "a = $a";
    echo "b = $b";
    echo "c = $c";

    ?>
</body>
</html>