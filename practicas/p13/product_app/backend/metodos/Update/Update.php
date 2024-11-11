<?php
    namespace backend\Update;
    use backend\DataBase as DataBase;

    require_once __DIR__ . '/../DataBase.php';
    class Update extends DataBase{

        public function __construct($db="marketzone"){
            parent::__construct("root","Z#~W2xwamQ69jQq", $db);
        }

        public function edit($producto){
            //$producto = file_get_contents('php://input');
            $data = array(
                'status'  => 'error',
                'message' => 'Ya existe un producto con ese nombre');
        
            if(!empty($producto)) {
                $jsonOBJ = json_decode($producto);
        
                $sql = "UPDATE productos SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}', modelo = '{$jsonOBJ->modelo}', precio = {$jsonOBJ->precio}, detalles = '{$jsonOBJ->detalles}', unidades = {$jsonOBJ->unidades}, imagen = '{$jsonOBJ->imagen}' WHERE id = $jsonOBJ->id";
                $result =  $this->conexion->query($sql);
        
                if($this->conexion->query($sql)){
                    $data['status'] =  "success";
                    $data['message'] =  "Producto modificado";
                } else {
                    $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
                // Cierra la conexion
                $this->conexion->close();
        
            }
            $this->data =  json_encode($data, JSON_PRETTY_PRINT);
        }
    }
?>