<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Verificación de edad</title>
</head>
<body>

  <?php
    if (($_POST['edad'] >= 18) && (($_POST['edad'] <= 35))){
        if ($_POST['sexo'] == "F"){
            echo "<h2>Bienvenida, usted está en el rango de edad permitido.</h2>";
        }
        else{
            echo "<h2>Bienvenido, usted está en el rango de edad permitido.</h2>";
        }
    }
    else{
        echo "<h2>No cumple con el rango de edad. Debe tener entre 18 y 35 años...</h2>";
    }
?>
</body>
</html> 