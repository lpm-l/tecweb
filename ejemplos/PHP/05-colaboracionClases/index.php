<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__.'/Pagina.php';

        $pagpag = new Pagina(
            'El rincon del vago',
            'El sótano del vago'
        );

        for ($i=0; $i<15; $i++){
            $pagpag->set_body('Prueba no.'.($i+1).' que debe aparecer en la pagina');
        }

        $pagpag->graficar();
    ?>
</body>
</html>