<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>P05</title>

</head>
<body>
    <?php
    #PREGUNTA 1
    echo "<h2>Pregunta 1</h2>\n\t";
    echo "<p>".'Variables válidas: $_myvar, $_7var, $myvar, $var7, $_element1'."<br/> \n\t";
    echo 'Estas variables son válidas ya que todas empiezan con letras o guion bajo'."<br/>\n\t";
    echo 'Variables inválidas: myvar, $house*5'."<br/>\n\t";
    echo "Estas variables no son válidas ya que tiene que iniciar con $, y no puede tener carácteres tales como * o /<br/></p>\n\t";

    #PREGUNTA 2
    echo "<h2>Pregunta 2</h2>\n\t";

    #asignación de variables

    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;

    echo "<p>Los valores de las variables son:<br/>\n\t";
    echo "a = $a<br/>\n\t";
    echo "b = $b<br/>\n\t";
    echo "c = $c<br/>\n\t";

    #nueva asignación

    $a = "PHP server";
    $b = &$a;

    echo "Los valores de las variables nuevas son:<br/>\n\t";
    echo "a = $a<br/>\n\t";
    echo "b = $b<br/>\n\t";
    echo "c = $c<br/>\n\t";

    echo '¿Qué ocurrió? dentro del código php, se cambió el valor de $a a 
        PHP server, y el valor de $b se cambio a un apuntador al valor de $a
        El valor de $c siempre fue un apuntador a $a, por eso los tres tiene los mismo'."<br/></p>\n\t";


    #PREGUNTA 3
    echo "<h2>Pregunta 3</h2>\n\t";
    $a = "PHP5";
    echo "<p>Tipo y valor de a: \n\t";
    echo var_dump($a);

    $z[] = &$a;
    echo "<br/>Tipo y valores de z: \n\t";
    ob_start();
    var_dump($z);
    $output = ob_get_contents();
    ob_end_clean();
    echo str_replace("&","&amp;", $output);

    $b = "5a version de PHP";
    echo "<br/>Tipo y valor de b: ";
    echo var_dump($b);

    $c = $b*10;
    echo "<br/>Tipo y valor de c (con un posible error): ";
    echo var_dump($c);

    $a .= $b;
    echo "<br/>Tipo y valor de a: ";
    echo var_dump($a);

    $b *= $c;
    
    echo "<br/>Tipo y valor de b: ";
    echo var_dump($b);

    $z[0] = "MySQL";
    echo "<br/>Tipo y valores de z: \n\t";
    ob_start();
    var_dump($z);
    $output = ob_get_contents();
    ob_end_clean();
    echo str_replace("&","&amp;", $output);

    echo "</p> \n <h2>Pregunta 4</h2>";
    echo "<p>Monstrando las variables usando ".'$GLOBALS:';

    echo "<br/>".'$GLOBALS[\'a\'] :  '.$GLOBALS['a'];
    echo "<br/>".'$GLOBALS[\'b\'] :  '.$GLOBALS['b'];
    echo "<br/>".'$GLOBALS[\'c\'] :  '.$GLOBALS['c'];
    echo "<br/>".'$GLOBALS[\'z\'] :';
    print_r($GLOBALS['z']);
    echo "</p>";


    echo "<h2>Pregunta 5</h2>\n\t";

    /*Dar el valor de las variables $a, $b, $c 
    al final del siguiente script:*/

    $a = "7 personas";
    $b = (integer) $a;
    $a = "9E3";
    $c = (double) $a;

    echo "<p> Los valores de cada variables son: <br/>\n\t";
    echo 'Valor de $a : '."$a <br/>\n\t";
    echo 'Valor de $b : '."$b <br/>\n\t";
    echo 'Valor de $c : '."$c <br/></p>\n\t";

    echo "<h2>Pregunta 6</h2>\n\t";

    //Asignamos un valor booleano como se pide en el documento

    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);

    #Intentamos mostrar los valores con echo:

    echo "<p> Los valores de las variables son: <br/>\n\t";
    echo '$a = ';
    var_dump($a);
    echo "<br/>".'$b = ';
    var_dump($b);
    echo "<br/>".'$c = ';
    var_dump($c);
    echo "<br/>".'$d = ';
    var_dump($d);
    echo "<br/>".'$e = ';
    var_dump($e);
    echo "<br/>".'$f = ';
    echo var_dump($f);

    #Imprimimos con echo usando var_export()
    echo '<br/>Valores de $c y $e (usando var_export())'."<br/>".'$c = ';
    echo var_export($c, true);
    echo "<br/>".'$e = '."\n\t";
    echo var_export($e, true)."</p>\n\t";

    #pregunta 7
    echo "<h2>Pregunta 7</h2>\n\t";
    
    echo '<p>Valores del servidor usando $_SERVER: <br/>'."\n\t";

    // echo var_dump($_SERVER);

    echo " Versión de Apache y PHP: ".$_SERVER['SERVER_SOFTWARE']."<br/>\n\t";
    echo "Nombre del sistema operativo del servidor: ".$_SERVER['HTTP_USER_AGENT']."<br/>\n\t";
    echo "Idioma del navegador: ".$_SERVER['HTTP_ACCEPT_LANGUAGE']."<br/></p>\n\t";


    echo "<h3>Ejemplo de formulario usando POST(extra)</h3>";
    ?>


        <form method="post" action="http://localhost/tecweb/practicas/p05/supervariables.php">
            <p>
            <label>Valor 1<br/>:</label>
            <input type="text" name="valor1"/>
            <input type="submit" value="Enviar" />
        </p>
        </form>

    <p>
        <a href="https://validator.w3.org/markup/check?uri=referer"><img
        src="https://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
    </p>
    
</body>
</html>