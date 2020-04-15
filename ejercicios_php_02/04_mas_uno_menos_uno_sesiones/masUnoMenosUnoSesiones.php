<?php
//Ejercicio basado en el primer ejercicio enviado,
// hecho de nuevo, mejorando alguna cosa (codigo más limpio).

session_start();
//comprueba que haya sesion con la variable acumulado.
$haySesionIniciada = isset($_SESSION["numberToWorkWith"]);
//VARIABLES BOOLEANAS PARA SABER QUE HACER
$wantToIncrement=isset($_REQUEST["increment"]);
$wantToDecrement=isset($_REQUEST["decrement"]);

//controla si tiene un valor asignado, si no lo tiene lo pone a 0
//si tiene un valor procede a preguntar que operación quiere realizar.
if ($quierenResetear || !$haySesionIniciada) {
    $_SESSION["numberToWorkWith"]=0;
} else if($wantToIncrement){
    $_SESSION["numberToWorkWith"]+=1;
} else if($wantToDecrement){
    $_SESSION["numberToWorkWith"]-=1;
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
    <!--
    input submit es menos preciso, se usa mas button porque se sabe exactamente lo que es asique acostumbrate Dioni.
    -->
    <form method="get">
        <button type="submit" name="increment" id="increment">Incrementar</button>
        <button type="submit" name="decrement" id="decrement">Decrementar</button>
    </form>

    <?php    
        echo "<h2>Numero: ".$_SESSION["numberToWorkWith"]."</h2>";
    ?>

</body>

</html>