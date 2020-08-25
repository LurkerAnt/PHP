<?php

class Personaje{
    private $name;
    private $clase;
    private $poder;
    private $vida;

    function  __construct(string $nombre, string $clase, int $poder, int $vida){
        $this->name=$nombre;
        $this->clase=$clase;
        $this->poder=$poder;
        $this->vida=$vida;
    }

    static function  crearPersonajeEnemigo(){
        $name=self::generarNombreEnemigo();
        $random=rand(1,3);
        if($random==1){
            $clase="Orco";
        }else if($random==2){
            $clase="Troll";
        }else if($random==3){
            $clase="Pickle Rick";
        }        
        $poder=rollStat();
        $vida=rollStat();

        return new Personaje($name,$clase,$poder,$vida);
    }

    function getName():string
    {
        return $this->name;
    }

    function setName($name):void{
        $this->name=$name;
    }


    function getClase():string{
        return $this->clase;
    }

    function setClase($clase): void{
        $this->clase=$clase;
    }

    function getPoder():int{
        return $this->poder;
    }

    function setPoder($poder):void{
        $this->poder=$poder;
    }

    function getVida():int{
        return $this->vida;
    }

    function setVida($vida):void{
        $this->vida=$vida;
    }
    private static function generarNombreEnemigo():string{
        $nombre = '';
        $longitud = rand(1, 7);
        $abc = 'abcdefghijklmnopqrstuvwxyz';
        for ($i = 0; $i < $longitud; ++$i) {
            $random = rand(1, 26);
            $nombre .= substr($abc, $random, 1);
        }

        return $nombre;
    }
}

?>