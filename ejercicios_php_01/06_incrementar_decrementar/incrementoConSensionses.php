<?php
//Ejercicio basado en el del MINDMAP, CON SESIONES.

session_start();
//comprueba que haya sesion con la variable acumulado.
$haySesionIniciada = isset($_SESSION["acumulador"]);

//print_r($_REQUEST);

//VARIABLES BOOLEANAS PARA SABER QUE HACER
$quierenSumar = isset($_REQUEST["suma"]);
$quierenRestar = isset($_REQUEST["resta"]);
$quierenResetear = isset($_REQUEST["reset"]);

//controla si tiene un valor asignado, si no lo tiene lo pone a 0
if ($quierenResetear || !$haySesionIniciada) {
    $numeroAManejar = 0;
    $sumatorio=0;
} else {
    $acumulador = $_SESSION["acumulador"];
    $sumatorio = $_REQUEST["numero"];
}
//si tiene un valor procede a preguntar que operación qiere realizar. Comprueba variables y entra por la que corresponda
//si se manda por suma no va a mandarse resta por lo que será false (EN TEORIA)

if ($quierenSumar) {
    $acumulador = $acumulador + $sumatorio;
} else if ($quierenRestar) {
    $acumulador = $acumulador - $sumatorio;
} 

$_SESSION["acumulador"]=$acumulador;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <H4><?= $acumulador ?></H4>
    <!--AQUI EL ERROR QUE TUVE FUE EL NO PONER NOMBRE, SIN EL NOMBRE EL GET NO RECOGE EL PARAMETRO (IMAGINO QUE POST TAMPOCO)-->
    <form method="get">
        <input type="number" name="numero" id="numero">
        <input type="submit" value="suma" name="suma">
        <input type="submit" value="resta" name="resta">
        <input type="submit" value="reset" name="reset">
    </form>
</body>

</html>