<?php

    function multiplo(){
        if(isset($_GET['numero']))
            {
                $num = $_GET['numero'];
                if ($num%5==0 && $num%7==0)
                {
                    echo var_dump($num);
                    return '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3><br>';
                }
                else
                {
                    echo var_dump($num);
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

        echo "<p>Se hicieron ".($k+1)." iteraciones con un total de ".(($k+1)*3)." numeros generados</p>";

    }

    function entero($min, $max){
        if (isset($_GET['dado'])){
            $aleat = rand ($min*10, $max*10) / 10;
            $int = (int)$aleat;
            $k = 0;
            $hm = (int)$_GET['dado'];
            $test = (($aleat - $int) == 0) && ($int%$hm == 0);
            while(!$test){
                echo "<p>$aleat no es entero y multiplo de $hm</p>";
                $aleat = rand($min*10, $max*10) / 10;
                $int = (int)$aleat;
                $k += 1;
                $test = (($aleat - $int) == 0) && ($int%$hm == 0);
            }
            echo "<h3>El numero $aleat es entero<br>";

            echo "Y tambien es multiplo de $hm</h3>";

            echo "<br><p>Se hicieron ".($k+1)." iteraciones</p>";
        }
    }

    function TestBlockHTML($replStr) {
            echo "<h1>{$replStr}</h1>";
      
    } 

    function Hola(){
        echo "hola ::)))))))))))))))))))<br>";
    }

    function letras(){
        $alfabeto = array();
        for ($i = 97; $i <= 122; $i++) {
            $alfabeto[$i] = chr($i);
        }
        echo '<p>| $key    |   $value |<br>';
        foreach ($alfabeto as $key => $value) {
            echo "| $key    |   $value |<br>";
        }
        echo "</p>";

    }
    
?>