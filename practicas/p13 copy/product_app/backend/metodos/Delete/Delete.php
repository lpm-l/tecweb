<?php
    namespace backend\Delete;
    use backend\DataBase as DataBase;

    require_once __DIR__ . '/../DataBase.php';
    class Delete extends DataBase{

        public function __construct($db="marketzone"){
            parent::__construct("root","Z#~W2xwamQ69jQq", $db);
        }

        public function delete($id){
            // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
            $data = array( );
            // SE VERIFICA HABER RECIBIDO EL ID
            if( isset($id) ) {
                //$id = $_POST['id'];
                // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
                $sql = "UPDATE productos SET eliminado=1 WHERE id = {$id}";
                if ( $this->conexion->query($sql) ) {
                    $data['status'] =  "success";
                    $data['message'] =  "Producto eliminado";
                } else {
                    $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
                $this->conexion->close();
            } 
            $this->data =  json_encode($data, JSON_PRETTY_PRINT);
        }
    }
?>