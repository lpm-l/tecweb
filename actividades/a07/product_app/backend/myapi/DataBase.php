<?php
    namespace API\BACKEND;

    abstract class DataBase{   

        protected $conexion;

        public function __construct($user,$pass, $db){
            $this->conexion = @mysqli_connect(
                'localhost',
                $user,
                $pass,
                $db
            );
        }
    }
?>