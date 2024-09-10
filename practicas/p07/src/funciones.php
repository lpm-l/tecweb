<?php

    function multiplo(){
        if(isset($_GET['numero']))
            {
                $num = $_GET['numero'];
                if ($num%5==0 && $num%7==0)
                {
                    return '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3><br>';
                }
                else
                {
                    return '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3><br>';
                }
            }
    }

    function aleatorio(){
            $matrix = array();
            $k = 0;

            do{                
                $uno = rand(0,100);
                $dos = rand(0,100);
                $tres = rand(0,100);

                $matrix[0][$k] = $uno;
                $matrix[1][$k] = $dos;
                $matrix[2][$k] = $tres;
                echo "$uno $dos $tres<br>";
                $k += 1;
            }while(!($uno%2==0 && $dos%2!=0 && $tres%2==0));

        echo "Se hicieron ".($k+1)." iteraciones con un total de ".(($k+1)*3)." numeros generados";

    }

    function entero($min, $max){
        if (isset($_GET['dado'])){
            $aleat = rand ($min*10, $max*10) / 10;
            $int = (int)$aleat;
            $k = 0;
            while(($aleat - $int) > 0){
                $aleat = rand($min*10, $max*10) / 10;
                $int = (int)$aleat ;
                $k += 1;
            }
            echo "El numero $aleat es entero. <br>";
            $hm = $_GET['dado'];
            if ($aleat%$hm == 0){
                echo "Y tambien es multiplo de $hm";
            }
            else {
                echo "Pero no es multiplo de $hm";
            }
            echo "<br>Se hicieron $k iteraciones";
        }
    }
?>