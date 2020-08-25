<?php

class conexion{
    private $servidor="localhost";
    private $usuario="root";
    //la config en mi php my admin no deja entrar sin pass
    private $password="1234";
    private $database="batallaDioni";

    public function conexion(){
        $conexion = mysqli_connect($this->servidor,$this->usuario,$this->password,$this->database);
        return $conexion;
    }

}

?>