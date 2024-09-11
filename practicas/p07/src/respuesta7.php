<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Verificación de edad</title>
</head>
<body>
    <?php
        $matricula = array();
        $vehi = array();
        $auto = array();
        $propietario = array();
        $matriculas = ["FYY3108","QVK3721","FJX3042","TST7987","JTH2177","PPE9106","FKP6810","IAL6443","XUX5884","IFH3367","ADR1116","CXN4138","OGL5262","SLB8053","LCW5763"];
        $nombres = ["Dagny Preethi","Kishor Lyanna","Steffie Pallav","Kiran Tamara","Madhu Harrison ","Sólveig Aspen","St John Angus","Chlodochar Abigaëlle","Ajay Clematis","Clayton Kellie "," Berislav Wibo","Roman Mildburg","Albertine Derya","Jeriah Temur","Chandan Cila"];
        $marcas = ["Nissan","Toyota","Nissan","Toyota","Toyota","Chevrolet","Toyota","Toyota","Ford","Jeep","Ford","Ford","BMW","Volvo","Nissan"];
        $modelos = ["2003","2013","1993","2020","2015","2023","2010","2018","2000","2006","1997","2016","2012","2011","2004"];
        $tipos = ["hachback","camioneta","camioneta","sedan","camioneta","sedan","sedan","sedan","hachback","hachback","camioneta","hachback","sedan","camioneta","hachback"];
        $direcciones = ["Calle Política","Calle Estudiante","Calle Cortina","Calle Vegetal","Calle Hueso","Calle Cactus","Calle Show","Calle Abogado","Calle Dedo","Calle Tallo","Calle Campeonato","Calle Joya","Calle Gato","Calle Extraño","Calle Amor"];
        $ciudades = ["Puebla","Morelos","Puebla","CDMX","Guadalajara","Puebla","CDMX","Puebla","Puebla","Xalapa","Puebla","Puebla","Puebla","Puebla","CDMX"];
        

        for ($i =0; $i<15; $i++){
            $auto[$i] = ["Marca" => $marcas[$i],"Modelo" => $modelos[$i],"Tipo" => $tipos[$i] ];
            $propietario[$i] = ["Nombre"=>$nombres[$i], "Ciudad" => $ciudades[$i], "Direccion" => $direcciones[$i]];
            $vehi[$i] = ["AUTO" => $auto[$i], "PROPIETARIO" => $propietario[$i]];
            $matricula[$i] = [$matriculas[$i]=> $vehi[$i]];
            echo var_dump($matricula[$i])."<br>";
        }
    ?>
</body>
</html> 