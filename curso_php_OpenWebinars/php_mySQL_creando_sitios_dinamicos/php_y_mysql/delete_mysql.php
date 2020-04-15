<?php
echo "<pre>";
$conexion = mysqli_connect('localhost', 'dionisio','12345','PRUEBA');
//muestra la conexion 
print_r( $conexion);


$delete_mysql= "delete from users Where id = 1";

$return=mysqli_query($conexion, $delete_mysql);

print_r($return);

mysqli_close($conexion);