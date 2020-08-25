<?php
require_once('requires.php');

function rollStats(Personaje $personaje){
    
  $personaje->setPoder(rand(1, 18));
  $personaje->setVida(rand(1,18));
}

function rollStat():int{
    return rand(1,18);
}

function rolld6(){
    return rand(1,6);
}

function hitEnemy($hitpoints, $roll){
    return ceil($hitpoints-$roll/2);
}

?>