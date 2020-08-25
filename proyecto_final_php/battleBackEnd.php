<?php
require_once ('requires.php');


class Batalla
{
    private $personaje;
    private $enemigo;

    public function __construct(Personaje $personaje, Personaje $enemigo)
    {
        $this->personaje = $personaje;
        $this->enemigo = $enemigo;
    }

    public function turnoCombate()
    {
        $rollPersonaje = rolld6();
        $rollEnemigo = rolld6();

        if ($rollPersonaje > $rollEnemigo) {
            $this->enemigo->setVida(($this->personaje->getPoder() + $rollPersonaje - $rollEnemigo) / 4);
            return [1,$this->enemigo->getVida()];
        } else if ($rollPersonaje < $rollEnemigo) {
            $this->personaje->setVida(($this->enemigo->getPoder() + $rollEnemigo - $rollPersonaje) / 4);
            return [2,$this->personaje->getVida()];
        }else return [0];
    }
}

?>