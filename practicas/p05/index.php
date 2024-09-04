<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>P05</title>
</head>
<body>
    <?php
    #PREGUNTA 1
    echo "<h2>Pregunta 1</h2>";
    echo "<p>".'Variables válidas: $_myvar, $_7var, $myvar, $var7, $_element1'."<br>";
    echo 'Estas variables son válidas ya que todas empiezan con letras o guion bajo'."<br>";
    echo 'Variables inválidas: myvar, $house*5'."<br>";
    echo "Estas variables no son válidas ya que tiene que iniciar con $, y no puede tener carácteres tales como * o /</p>";

    #PREGUNTA 3
    echo "<br><h2>Pregunta 2</h2>";

    #asignación de variables

    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;

    echo "<p>Los valores de las variables son:<br>";
    echo "a = $a<br>";
    echo "b = $b<br>";
    echo "c = $c<br>";

    #nueva asignación

    $a = "PHP server";
    $b = &$a;

    echo "Los valores de las variables nuevas son:<br>";
    echo "a = $a<br>";
    echo "b = $b<br>";
    echo "c = $c<br>";

    echo '¿Qué ocurrió? dentro del código php, se cambió el valor de $a a 
        PHP server, y el valor de $b se cambio a un apuntador al valor de $a
        El valor de $c siempre fue un apuntador a $a, por eso los tres tiene los mismo'."</p>";


    #PREGUNTA 3
    echo "<br><h2>Pregunta 3</h2>";
    $a = "PHP5";
    echo "<p>Tipo y valor de a: ";
    echo var_dump($a);

    $z[] = &$a;
    echo "<br>Tipo y valores de z: ";
    echo var_dump($z);

    $b = "5a version de PHP";
    echo "<br>Tipo y valor de b: ";
    echo var_dump($b);

    $c = $b*10;
    echo "<br>Tipo y valor de c (con un posible error): ";
    echo var_dump($c);

    $a .= $b;
    echo "<br>Tipo y valor de a: ";
    echo var_dump($a);

    $b *= $c;
    
    echo "<br>Tipo y valor de b: ";
    echo var_dump($b);

    $z[0] = "MySQL";
    echo "<br>Tipo y valores de z: ";
    echo var_dump($z)."</p>";

    echo "<h2>Pregunta 4</h2>";
    echo "<p>Monstrando las variables usando ".'$GLOBALS:';

    echo "<br>".'$GLOBALS[\'a\'] :  '.$GLOBALS['a'];
    echo "<br>".'$GLOBALS[\'b\'] :  '.$GLOBALS['b'];
    echo "<br>".'$GLOBALS[\'c\'] :  '.$GLOBALS['c'];
    echo "<br>".'$GLOBALS[\'z\'] :';
    print_r($GLOBALS['z']);

    ?>
</body>
</html>