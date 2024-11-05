<?php
    abstract class DataBase{

        protected $conexion;

        public function __construct($user = "root",$pass="Z#~W2xwamQ69jQq", $db="marketzone"){
            $conexion = @mysqli_connect(
                'localhost',
                $user,
                $pass,
                $db
            );
        }
    }

?>