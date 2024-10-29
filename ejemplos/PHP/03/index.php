<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 3</title>
</head>
<body>
    <?php
        require_once __DIR__."/Cabecera.php";

/*         use EJEMPLOS\POO\Cabecera as Cabecera;
        $cab = new Cabecera('El rincon del programador', 'center');
         */
        
        use EJEMPLOS\POO\Cabecera2 as Cabecera;
        $cab = new Cabecera('El rincon del programador', 'center', 'https://x.com');

        $cab->graficar();

    ?>
</body>
</html>