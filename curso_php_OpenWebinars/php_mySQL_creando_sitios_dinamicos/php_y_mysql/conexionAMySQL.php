<?php
echo "<pre>";
$conexion = mysqli_connect('localhost', 'dionisio','12345','PRUEBA');
//muestra la conexion 
print_r( $conexion);

$insert = "insert into users (name, email) values ('dionisio', 'dionisio@email.com')";
//con mysqli_query se lanza la conexion y la consulta y te devuelve true si ha sido valida.

$return=mysqli_query($conexion, $insert);

echo($return);
//es importante cerrar las conexiones para que no gasten memoria
mysqli_close($conexion);