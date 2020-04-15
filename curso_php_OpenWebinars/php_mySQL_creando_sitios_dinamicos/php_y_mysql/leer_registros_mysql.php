<?php
echo "<pre>";
$conexion = mysqli_connect('localhost', 'dionisio','12345','PRUEBA');
//muestra la conexion 
//print_r( $conexion);

$select_sql = "select id, name, email, created from users";
//con esto solo nos muestra un registro, para que nos muestre todos hay que hacerlo con un bucle
$result=mysqli_query($conexion,$select_sql);
//con este metodo te enseña la consulta, si se recibe con MYSQLI_NUM te devuelve un indice numerico
$rows_consulta=mysqli_fetch_array($result, MYSQLI_NUM);


print_r($rows_consulta);

//por otro lado si se recibe con MYSQL_ASSOC nos devuelve el nombre del campo.
//$rows_consulta=mysqli_fetch_array($result, MYSQLI_ASSOC);

//tal que así (solo sale el segundo porque el primero se ha igualado arriba con MYSQLI_NUM)



do {

    $data[]= $rows_consulta;

} while ($rows_consulta=mysqli_fetch_array($result, MYSQLI_ASSOC));

print_r($data);

//usando MYSQLI_BOTH nos muestra las dos

// $rows_consulta=mysqli_fetch_array($result, MYSQLI_BOTH);

// print_r($rows_consulta);


mysqli_close($conexion);