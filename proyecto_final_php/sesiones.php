<?php
require_once('requires.php');

function sessionStartSiNoLoEsta()
{
    if(!isset($_SESSION)) {
        session_start();
    }
}

// Comprueba si hay sesión-usuario iniciada en la sesión-RAM.
function haySesionIniciada()
{
    sessionStartSiNoLoEsta();
    return isset($_SESSION['sesionIniciada']);
}

function guardarPersonajeEnSesion(Personaje $personaje)
{
    sessionStartSiNoLoEsta();
    $_SESSION["nombrePersonaje"] = $personaje->getName();
    $_SESSION["clasePersonaje"] = $personaje->getClase();
    $_SESSION["poderPersonaje"] = $personaje->getPoder();
    $_SESSION["vidaPersonaje"] = $personaje->getVida();
}

function destruirSesionYCookies($email)
{
    session_destroy();

}