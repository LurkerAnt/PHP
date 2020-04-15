<?php
//el nombre de la cookie es siempre el mismo, asique se inicializa siempre igual.
$cookie_name = "textoCookie";


// comprobaciones de formulario
$quiereAdd=isset($_REQUEST["addText"]);
$quiereMostrar = isset($_REQUEST["showText"]);
$quiereBorrar = isset($_REQUEST["resetText"]);
$tieneTexto=isset($_REQUEST["texto"]);

//comprobaciones para variables del texto a añadir.
if ($tieneTexto&&$quiereAdd) {
    $textToAdd =$_COOKIE[$cookie_name]. "<p>" . $_REQUEST["texto"] . "</p>";
    
} else {
    $textToAdd = " ";
}

//setup de cookie

if (isset($_COOKIE[$cookie_name])) {
    //añade el $textToAdd si lo quiere añadir
    if ($quiereAdd) {
        setcookie($cookie_name, $textToAdd, time() + (86400 * 30), "/"); //duración de 1 día.
    } else if ($quiereBorrar) {
    //la reinicia a Texto: si quiere borrar.
        $cookie_value = "Texto: ";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //duración de 1 día.
    }
} else {
    $cookie_value = "Texto: ";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //duración de 1 día.
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #texto {
            width: 400px;
        }
    </style>
</head>

<body>
    <!-- solo method="get" porque se llama a si misma la pagina. -->
    <form method="get">
        <input type="text" name="texto" id="texto"><br>
        <button type="submit" name="addText" id="addText">Añadir Texto a Cookie</button>
        <button type="submit" name="showText" id="showText">Mostrar Texto Nuevo</button>
        <button type="submit" name="resetText" id="resetText">Borrar Texto</button>

    </form>
    <?php
    //comprobando los dos, muestra el que esta almacenado,
    // si le das a mostrar recarga con el contenido nuevo.
    if ($quiereMostrar||$quiereAdd) {
        echo $_COOKIE[$cookie_name];
    }else{
        echo "Texto: ";
    }
    
    ?>

</body>

</html>