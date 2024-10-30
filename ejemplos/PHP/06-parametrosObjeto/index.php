<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 6</title>
</head>
<body>
    <?php
        include_once __DIR__.'/Opcion.php';
        include_once __DIR__.'/Menu.php';
        $menu1 = new Menu('vertical');
        $opc1 = new Opcion("NO","https://www.twitter.com", "#C3D9FF");
        $menu1->insertar_opcion($opc1);

        $opc2 = new Opcion("OUT", "https://www.youtube.com",'#C3D9FF' );
        $menu1->insertar_opcion($opc2);

        $opc3 = new Opcion("In", "https://www.classroom.com",'#C3D9FF' );
        $menu1->insertar_opcion($opc3);

                    
        $menu1->graficar();
    ?>
</body>
</html>