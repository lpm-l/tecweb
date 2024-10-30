<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__.'/Operacion.php';

        $suma = new Suma;
        $suma->setValor1(10);
        $suma->setValor2(25);
        $suma->operar();

        echo '<h1> El resultado es: '.$suma->getResultado().'<br></h1>';

        $resta = new Resta;
        $resta->setValor1(18);
        $resta->setValor2(13);
        $resta->operar();

        echo '<h1> El resultado es: '.$resta->getResultado().'<br></h1>';
    ?>
</body>
</html>