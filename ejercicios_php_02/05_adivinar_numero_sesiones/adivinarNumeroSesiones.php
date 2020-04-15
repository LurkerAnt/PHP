<?php

//Modificación del ejercicio hecho con cookies

$startGame = isset($_REQUEST["startGame"]);
$hayNumero = isset($_REQUEST["numberToCheck"]);
$quiereComprobar = isset($_REQUEST["checkNumber"]);
$mostrarSolucion = isset($_REQUEST["showAnswer"]);
$quiereResetear = isset($_REQUEST["resetNumber"]);
$name_tries = "triesSession";
$name_number = "numeroSession";
//en este caso se lee en la sin tener que refrescar la pagina asíque se inicia en 5.
$value_tries_at_start = 5;

//comprobación si la sesion esta iniciada
if (session_status()==PHP_SESSION_NONE){
    session_start();
}

function setNumberAndTriesInSession(){
    global $name_number;
    global $name_tries;
    global $value_tries_at_start;
    $value_number = rand(0, 20);

    $_SESSION[$name_number]=$value_number;
    $_SESSION[$name_tries]=$value_tries_at_start;
}

function showStartButton(){
    echo "<form method=\"get\">
        <button type=\"submit\" name=\"startGame\" id=\"startGame\">Comenzar Juego</button>
        </form>";
}

function showRetryButton(){
    echo "<form method=\"get\"><button type=\"submit\" name=\"resetNumber\" id=\"resetNumber\">Play New Game</button> </form>";
}

function showSolution(){
    global $name_number;
    echo "<h3>Solución: " . $_SESSION[$name_number]."</h3>";
}

function showCompleteForm(){
    echo
            "<form method=\"get\">
            <input type=\"number\" name=\"numberToCheck\" id=\"numberToCheck\">
            <button type=\"submit\" name=\"checkNumber\" id=\"checkNumber\">Comprobar Numero</button>
            <button type=\"submit\" name=\"showAnswer\" id=\"showAnswer\">Mostrar Solucion</button>
            <button type=\"submit\" name=\"resetNumber\" id=\"resetNumber\">Resetear Numero</button>
            </form>";

}

function checkIfNumberEqualsToSession(){
    global $name_tries, $name_number;
    $numberToCheck = $_REQUEST["numberToCheck"];
    if ($numberToCheck == $_SESSION[$name_number]) {
        echo "<h1> Has acertado! </h1>";
        showRetryButton();
    } else {
        echo "<h1> Has fallado! </h1>";
        $_SESSION[$name_tries]-=1;
        if ($_SESSION[$name_tries] > 0) {
            echo "<h3>Intentos Restantes: " . $_SESSION[$name_tries] . "</h3>";
            if($numberToCheck>$_SESSION[$name_number]){
                echo "<h3>El número que buscas es menor.</h3>";
            }else{
                echo "<h3>El número que buscas es mayor.</h3>";
            }
        } else if ($_SESSION[$name_tries]==0){
            echo "
            <h3>Se acabaron los intentos.</h3><br>";
            showRetryButton();
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Acierta el número del 1 al 20: </h3>
    <?php

    if (!$quiereComprobar && !$startGame && !$mostrarSolucion) {
        showStartButton();
    } else if ($quiereComprobar || $startGame || $mostrarSolucion) {
        if ($startGame) {
            setNumberAndTriesInSession();
        }
        showCompleteForm();  
        if ($quiereComprobar) {
            checkIfNumberEqualsToSession();
        } else if ($mostrarSolucion) {
            showSolution();
        }
    } else if ($quiereResetear) {
        setNumberAndTriesInSession();
    }
    ?>

</body>

</html>