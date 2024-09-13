<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Verificación de edad</title>
</head>
<body>
    <h1>Resultados de la búsqueda de matriz</h1>

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
            $auto[$matriculas[$i]] = ["Marca" => $marcas[$i],"Modelo" => $modelos[$i],"Tipo" => $tipos[$i] ];
            $propietario[$matriculas[$i]] = ["Nombre"=>$nombres[$i], "Ciudad" => $ciudades[$i], "Direccion" => $direcciones[$i]];
            $vehi[$matriculas[$i]] = ["AUTO" => $auto[$matriculas[$i]], "PROPIETARIO" => $propietario[$matriculas[$i]]];
            $matricula[$matriculas[$i]] = $vehi[$matriculas[$i]];
            
        }   
        function mostrarTodo($matricula){
            foreach ($matricula as $key => $value) {
                echo "<h3>Matrícula $key </h3>";
                foreach ($value as $key2 => $value2){
                    foreach ($value2 as $fkey => $fvalue){
                        echo "<h3>$fkey :  $fvalue</h3>";
                    }
                }
                echo "<br>";
            }
        }
    
        function mostrarUno($vehi){
            $mati = $_POST['mat'];
            echo "<h3>Matricula:\t$mati</h3>"; 
            foreach($vehi as $concep => $arr){
                foreach($arr as $valor => $var){
                    echo "<h3>$valor:\t$var</h3>";
                }
            }
        }     

        if (isset($_POST['uno']) && isset($_POST['mat'])){
            $id = $_POST['mat'];
            mostrarUno($vehi[$id]);
        }
        if (isset($_POST['todo'])){
            mostrarTodo($matricula);
        }

    ?>


</body>
</html> 