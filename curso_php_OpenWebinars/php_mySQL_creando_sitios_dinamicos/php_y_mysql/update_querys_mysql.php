<?php
echo "<pre>";
$conexion = mysqli_connect('localhost', 'dionisio','12345','PRUEBA');
//muestra la conexion 
print_r( $conexion);

$update_mysql= "update users set name= 'Dioniso Fernandez Ortiz' Where id= 1";

$return = mysqli_query($conexion, $update_mysql);

print_r($return);

mysqli_close($conexion);