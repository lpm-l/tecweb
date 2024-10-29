<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__.'/Tabla.php';

        $tab = new Tabla(2,3,'border:1px solid');
        $tab->cargar(0,0,'A');
        $tab->cargar(0,1,'B');
        $tab->cargar(1,0, 'C');
        $tab->cargar(1,1,'D');
        $tab->cargar(1,2,'E');
        $tab->cargar(2,1,'G');
        $tab->cargar(2,2,'H');
        //$tab->inicio_tabla();
        $tab->cargar(2,3,'I');
        $tab->graficar();


    ?>
</body>
</html>