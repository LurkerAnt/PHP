<?php

$startGame = isset($_REQUEST["startGame"]);
$hayNumero = isset($_REQUEST["numberToCheck"]);
$quiereComprobar = isset($_REQUEST["checkNumber"]);
$mostrarSolucion = isset($_REQUEST["showAnswer"]);
$quiereResetear = isset($_REQUEST["resetNumber"]);
$cookie_name_tries = "triesCookie";
$cookie_name_number = "numeroCookie";
//el número de intentos real es 5 pero como el primer intento
//la cookie no esta creada o leida (no estoy seguro) 
//así el número de intentos es 5
$cookie_value_tries_at_start = 4;

function createBothCookies(){
    global $cookie_name_tries, $cookie_value_tries_at_start;
    setcookie($cookie_name_tries, $cookie_value_tries_at_start, time() + (86400 * 30), "/"); //duración de 1 día.


    global $cookie_name_number;
    $cookie_value_number = rand(0, 20);
    setcookie($cookie_name_number, $cookie_value_number, time() + (86400 * 30), "/"); //duración de 1 día.
}

function createTriesCookie(){
    global $cookie_name_tries;
    $cookie_value_tries_at_start = 5;
    setcookie($cookie_name_tries, $cookie_value_tries_at_start, time() + (86400 * 30), "/"); //duración de 1 día.

}

function createNumberCookie(){

    global $cookie_name_number;
    $cookie_value_number = rand(0, 20);
    setcookie($cookie_name_number, $cookie_value_number, time() + (86400 * 30), "/"); //duración de 1 día.

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
    global $cookie_name_number;
    echo "<h3>Solución: " . $_COOKIE[$cookie_name_number]."</h3>";
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

function checkIfNumberEqualsToCookie(){
    global $cookie_name_tries, $cookie_name_number;
    $numberToCheck = $_REQUEST["numberToCheck"];
    if ($numberToCheck == $_COOKIE[$cookie_name_number]) {
        echo "<h1> Has acertado! </h1>";
        showRetryButton();
    } else {
        echo "<h1> Has fallado! </h1>";
        if ($_COOKIE[$cookie_name_tries] > 0) {
            $cookie_value_tries_updated = $_COOKIE[$cookie_name_tries] - 1;
            setcookie($cookie_name_tries, $cookie_value_tries_updated, time() + (86400 * 30), "/");
            echo "<h3>Intentos Restantes: " . $_COOKIE[$cookie_name_tries] . "</h3>";
            if($numberToCheck>$_COOKIE[$cookie_name_number]){
                echo "<h3>El número que buscas es menor.</h3>";
            }else{
                echo "<h3>El número que buscas es mayor.</h3>";
            }
        } else {
            echo "
            <h3>Se acabaron los intentos.</h3><br>";
            showRetryButton();
        }
    }
}

if (!isset($_COOKIE[$cookie_name_number])) {
    createNumberCookie();
}

if (!isset($_COOKIE[$cookie_name_tries])) {
    createTriesCookie();
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
            createBothCookies();
        }
        showCompleteForm();  
        if ($quiereComprobar) {
            checkIfNumberEqualsToCookie();
        } else if ($mostrarSolucion) {
            showSolution();
        }
    } else if ($quiereResetear) {
        createBothCookies();
    }
    ?>

</body>

</html>