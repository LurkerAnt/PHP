<?php
//Ejercicio basado en el del MINDMAP, PERO SIN SESIONES.
//$_REQUEST --> Un array asociativo que por defecto contiene el contenido de $_GET, $_POST y $_COOKIE.


//VARIABLES BOOLEANAS PARA SABER QUE HACER
$valorAsignado = isset($_REQUEST["numero"]);
$quierenSumar = isset($_REQUEST["suma"]);
$quierenRestar = isset($_REQUEST["resta"]);
$quierenResetear = isset($_REQUEST["reset"]);
//controla si tiene un valor asignado, si no lo tiene lo pone a 0

//echo "<pre>";
//print_r($_REQUEST);
if (!$valorAsignado) {
    $numeroAManejar = 0;
} else{
    $numeroAManejar=$_REQUEST['acumulado'];
    $sumatorio=$_REQUEST['numero'];
}
//si tiene un valor procede a preguntar que operación qiere realizar. Comprueba variables y entra por la que corresponda
//si se manda por suma no va a mandarse resta por lo que será false (EN TEORIA)

if ($quierenSumar) {
    $numeroAManejar = $numeroAManejar + $sumatorio;
} else if ($quierenRestar) {
    $numeroAManejar = $numeroAManejar - $sumatorio;
} else if ($quierenResetear) {
    $numeroAManejar = 0;
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

    <H4><?= $numeroAManejar ?></H4>
<!--AQUI EL ERROR QUE TUVE FUE EL NO PONER NOMBRE, SIN EL NOMBRE EL GET NO RECOGE EL PARAMETRO (IMAGINO QUE POST TAMPOCO)-->
    <form method="get">
        <input type="number" name="numero" id="numero">
        <input type="hidden" name="acumulado" value='<?= $numeroAManejar ?>'>
        <input type="submit" value="suma" name="suma">
        <input type="submit" value="resta" name="resta">
        <input type="submit" value="reset" name="reset">
    </form>
</body>

</html>