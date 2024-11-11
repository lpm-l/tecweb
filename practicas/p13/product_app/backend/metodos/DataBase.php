<?php
    namespace backend;
    abstract class DataBase{
        protected $conexion;
        protected $data = array();
        public function __construct($user,$pass, $db){
            $this->conexion = @mysqli_connect(
                'localhost',
                $user,
                $pass,
                $db
            );
        }

        public function getData(){
            return $this->data;
        }
    }
?>