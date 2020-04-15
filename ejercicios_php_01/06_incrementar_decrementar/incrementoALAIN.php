<?php

session_start();

$haySesion = isset($_SESSION["acumulado"]);

$quierenSumar = isset($_REQUEST["sumar"]);
$quierenRestar = isset($_REQUEST["restar"]);
$quierenResetear = isset($_REQUEST["resetear"]);
$formularioEnviado = $quierenSumar || $quierenRestar;

if (!$haySesion || $quierenResetear) {
    $acumulado = 0; // Valor por defecto.
} else {
    $acumulado = $_SESSION["acumulado"];
}

if (!$formularioEnviado || $quierenResetear) { // NO hay formulario enviado.
    $diferencia = 1; // Por defecto, para cuando no haya formulario enviado.
} else { // HAY formulario enviado.
    $diferencia = $_REQUEST["diferencia"];

    if ($quierenSumar) {
        $acumulado = $acumulado + $diferencia;
    } else {
        $acumulado = $acumulado - $diferencia;
    }
}

$_SESSION["acumulado"] = $acumulado;

?>



<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

    <h1><?= $acumulado ?></h1>

    <form method='get'>
        <input type='number' name='diferencia' value='<?= $diferencia ?>'>
        <input type='submit' name='sumar' value='Sumar'>
        <input type='submit' name='restar' value='Restar'>
        <input type='submit' name='resetear' value='Resetear más complicado'>
    </form>

    <a href="IncrementarDecrementar.php?resetear">Resetear más simple (preferible)</a>

</body>

</html>