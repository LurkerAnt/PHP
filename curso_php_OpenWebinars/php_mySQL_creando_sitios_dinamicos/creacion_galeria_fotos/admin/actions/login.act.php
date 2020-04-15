<?php

include dirname(dirname(dirname(__FILE__))) . "/common/utils.php";
include dirname(dirname(dirname(__FILE__))) . "/common/config.php";
include dirname(dirname(dirname(__FILE__))) . "/common/mysql.php";

//debug($_POST)

$email_login=$_POST['email_login'];
$login_password=md5($_POST['login_password']);

$conexion_mysql=Connect($configuracion_mysql['database']);

$sql  = "select * from authors where email = '".$email_login."' And password = '".$login_password."'";

$rows = ExecuteQuery($sql,$conexion_mysql);
Close($connexion_mysql);

if (empty($rows)){
    //si los row estan vacíos nos lanza a una pagina de error
    header ("location: ../error.php?error=1");
}else{
    //si tienen algo lo almacena en la sesion y nos lanza a la pagina del listado.
    session_start();
    $_SESSION['id']=$rows[0]['id'];
    $_SESSION['email']=$rows[0]['email'];
    $_SESSION['session_id']=session_id();

    header ("location: ../home.php?page=listado");
}
