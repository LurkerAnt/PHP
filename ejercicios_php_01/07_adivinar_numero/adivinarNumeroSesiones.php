<?php
//Ejercicio basado en el del MINDMAP, CON SESIONES.

session_start();
//comprueba que haya sesion con la variable acumulado.
$haySesionIniciada = isset($_SESSION["numeroVariable"]);
$quiereResetear = isset($_REQUEST["reset"]);
$hayNumeroONo = isset($_REQUEST["numero"]);

//controla si tiene un valor asignado, si no lo tiene lo pone a 0
if ($quiereResetear || !$haySesionIniciada) {
    $numeroVariable = rand(0, 20);
} else {
    $numeroVariable = $_SESSION["numeroVariable"];
}



function sonIguales()
{
    $sonLosNumerosIguales = False;

    $numeroRecibido = $_REQUEST["numero"];

    if ($numeroRecibido==null){
        echo "<h4>Comienza el Juego.</h4>";
    }else if ($numeroRecibido == $_SESSION["numeroVariable"]) {
        echo "<h4> Has acertao. Se ha generado un nuevo número </h4>";
        $numeroVariable = rand(0, 20);
        $_SESSION["numeroVariable"] = $numeroVariable;
    } else {
        echo "<h4> No has acertado. Vuelve a intentarlo. </h4>";
    } 


    //LAS PRUEBAS CON SWITCH NO HAN FUNCIONADO, UNICAMENTE APARECIAN POR PANTALLA LOS ACIERTOS. HAY ALGÚN FALLO, EN OTRO EJERCICIO VOLVERA A APARECER.

    // switch ($sonLosNumerosIguales) {
    //     case "True":
    //         echo "<h4> Has acertao. Se ha generado un nuevo número </h4>";
    //         $numeroVariable = rand(0, 20);
    //         $_SESSION["numeroVariable"] = $numeroVariable;
    //         break;
    //     case "False":

    //         echo "<h4> No has acertado. Vuelve a intentarlo. </h4>";

    //         break;

    //     default:
    //         break;
    // }
}

$_SESSION["numeroVariable"] = $numeroVariable;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!--AQUI EL ERROR QUE TUVE FUE EL NO PONER NOMBRE, SIN EL NOMBRE EL GET NO RECOGE EL PARAMETRO (IMAGINO QUE POST TAMPOCO)-->
    <h3>Acierta el número del 1 al 20: </h3>

    <p><?= sonIguales() ?></p>

    <form method="get">
        <input type="number" name="numero" id="numero">
        <input type="submit" value="enviar" name="Enviar">
        <input type="submit" value="reset" name="reset">
    </form>



    <form method="post">
        <input type="submit" value="Solucion" name="Solucion">
    </form>

    <?php
    $mostrarSolucion = isset($_REQUEST["Solucion"]);
    if ($mostrarSolucion) {
        echo "<h3>" . $_SESSION["numeroVariable"] . "</h3>";
    }
    ?>
</body>

</html>