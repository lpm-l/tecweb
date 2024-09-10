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
            $uno = rand(0,100);
            $dos = rand(0,100);
            $tres = rand(0,100);
            $matrix = array();
            $k = 0;
            $matrix[0][$k] = $uno;
            $matrix[1][$k] = $dos;
            $matrix[2][$k] = $tres;
            echo "<br>$uno $dos $tres<br>";

            while(!($uno%2==0 && $dos%2!=0 && $tres%2==0)){
                $k += 1;
                
                $uno = rand(0,100);
                $dos = rand(0,100);
                $tres = rand(0,100);

                $matrix[0][$k] = $uno;
                $matrix[1][$k] = $dos;
                $matrix[2][$k] = $tres;
                echo "$uno $dos $tres<br>";
            }

        echo "Se hicieron ".($k+1)." iteraciones con un total de ".(($k+1)*3)." numeros generados";

    }
?>