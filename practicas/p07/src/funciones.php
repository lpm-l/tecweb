<?php

    function multiplo(){
        if(isset($_GET['numero']))
            {
                $num = $_GET['numero'];
                if ($num%5==0 && $num%7==0)
                {
                    return '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
                }
                else
                {
                    return '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
                }
            }
    }

    function aleatorio(){
            $uno = rand(0,100);
            $dos = rand(0,100);
            $tres = rand(0,100);
            $matrix = array();
            $k = 0;
            $matrix[0][k] = $uno;
            $matrix[1][k] = $uno;
            $matrix[2][k] = $uno;

            while(!($uno%2==0 && $dos%2!=0 && $tres%2==0)){
                $k += 1;
                
                $uno = rand(0,100);
                $dos = rand(0,100);
                $tres = rand(0,100);

                $matrix[0][k] = $uno;
                $matrix[1][k] = $uno;
                $matrix[2][k] = $uno;
            }
    }
?>