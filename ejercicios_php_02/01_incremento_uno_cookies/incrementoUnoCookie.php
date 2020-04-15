<?php
//crea el nombre de la cookie
$cookie_name = "numeroCookie";
$cookie_value=0;

//almacena lo que quiere hacer
$quiereIncrementar = isset($_REQUEST["incrementar"]);
$quiereDecrementar = isset($_REQUEST["decrementar"]);

//si es la primera vez que carga la pagina crea la  cookie, sino la actualiza
//si esta creada se comprueba si se quiere incrementar o decrementar

//no hay manera de actualizar una cookie asique lo que se hace es crearla de nuevo (se sobrescribe).
if (isset($_COOKIE[$cookie_name])) {

    if ($quiereIncrementar) {
        $cookie_value = $_COOKIE[$cookie_name]+ 1;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //duración de 1 día.
    } else if ($quiereDecrementar) {
        $cookie_value = $_COOKIE[$cookie_name]- 1;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //duración de 1 día.
    }
} else {
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //duración de 1 día.
}

//muestra el valor de la cookie por pantalla, que incrementa y drecrementa
if (isset($_COOKIE[$cookie_name])) {
    echo "<h3>" . $_COOKIE[$cookie_name] . "</h3>";
} else {
    echo "<h3>0</h3>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incrementar en 1</title>
</head>

<body>
    <!--Hago los dos porque hay que entretenerse y aprender, seamos sinceros, tampoco hay demasiada diferencia-->


    <form method="get">
        <button type="submit" name="incrementar" id="incrementar" value="incrementar">Incrementar</button>
        <button type="submit" name="decrementar" id="decrementar" value="decrementar">Decrementar</button>
    </form>

</body>

</html>