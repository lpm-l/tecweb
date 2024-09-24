<?php
$nombre = $_POST['name']; 
$marca  = $_POST['marca'];
$modelo = $_POST['model'];
$precio = $_POST['precio'];
$detalles = $_POST['deta'];
$unidades = $_POST['uni'];
$imagen   = $_POST['imgn'];

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', 'Z#~W2xwamQ69jQq', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

/** Crear una tabla que no devuelve un conjunto de resultados */
$sql = "INSERT INTO productos select null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}' 
from dual WHERE NOT EXISTS (SELECT 1 FROM productos WHERE nombre = '{$nombre}' AND marca = '{$marca}' AND modelo = '{$modelo}')";
echo $sql;


#$sql = "INSERT INTO prod select null, 5,{$num},{$num} from dual WHERE NOT EXISTS (SELECT 1 FROM prod WHERE num1 = {$num} AND num2 = {$num})";

if ( $link->query($sql))
{
    if ($link->insert_id == 0){
        echo "Producto ya existe en la BD";
    }else{
    echo 'Producto insertado con ID: '.$link->insert_id;
    }
}
else
{
	echo 'El Producto no pudo ser insertado =(';
}

$link->close();
?>