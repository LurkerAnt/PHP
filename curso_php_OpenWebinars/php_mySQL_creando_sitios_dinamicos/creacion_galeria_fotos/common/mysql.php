<?php

function Connect ($config=array()){
    $conexion_mysql=mysqli_connect( $config['host'], $config['username'], $config['password'], $config['database']);
    mysqli_set_charset( $conexion_mysql, $config['encoding']);


    return ($conexion_mysql);
}

function Execute ($sql,$conexion_mysql){
    $return = mysqli_query($conexion_mysql, $sql);
    return($return);
}

function ExecuteQuery( $sql, $conn) 
{      

    $result = mysqli_query( $conn, $sql,MYSQLI_STORE_RESULT);
  if  ( $row = mysqli_fetch_array($result , MYSQLI_BOTH)) 
  {
    do 
    {   
      $data[] = $row;
    }
    while ( $row = mysqli_fetch_array( $result, MYSQLI_BOTH));
  }
  else 
  {
    $data = null;
  }

  mysqli_free_result( $result);
  return ( $data);

}


function Close ($conexion_mysql){
    mysqli_close($conexion_mysql);
    unset($conexion_mysql);
}