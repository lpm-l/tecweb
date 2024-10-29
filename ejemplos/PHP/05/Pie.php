<?php
    class Pie{
        private $mensaje;

        public function __construct($msg){
            $this->mensaje = $msg;
        }

        public function graficar(){
            $estilo = 'text-align: center';
            echo '<h4 style="'.$estilo.'">'.$this->mensaje.'</h4>';
        }

    }
?>