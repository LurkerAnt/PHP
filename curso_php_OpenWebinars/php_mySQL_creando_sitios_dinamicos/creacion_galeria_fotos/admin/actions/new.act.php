<?php


include dirname(dirname(dirname(__FILE__))) . "/common/utils.php";
include dirname(dirname(dirname(__FILE__))) . "/common/config.php";
include dirname(dirname(dirname(__FILE__))) . "/common/mysql.php";

debug($_POST);
#recogemos los parametros mandados por POST

$display_name=$_POST['display_name'];
$email=$_POST['email'];
$password= md5($_POST['password']);

if (isset($_POST['enabled'])){
    $enabled=1;
}else{
    $enabled=0;
}

#conectamos a la base de datos
$connection = Connect($configuracion_mysql['database']);

$sql= "insert into authors (name, email, password, enabled) values('".$display_name."','".$email."','".$password."',".$enabled.")";
$return=Execute($sql, $connection);

Close($connection);


header ("location: ../home.php");