<?php
require_once('requires.php');
$metodos=new metodos();

if(isset($_REQUEST['grabarPuntuacionFalsa'])){
    $resultado=$metodos->grabarPuntuacionEnBaseDatos($_REQUEST['charFakeName'],$_REQUEST['charFakeClass'],$_REQUEST['charFakeScore']);
    if($resultado=true){
        echo "<h1>Puntuacion Falsa grabada</h1>";
    }else{
        echo "<h1>Puntuacion Falsa No grabada</h1>";
    }
}

if(isset($_REQUEST['grabarPuntuacion'])){
    $resultado=$metodos->grabarPuntuacionEnBaseDatos($_REQUEST['charName'],$_REQUEST['charClass'],$_REQUEST['charScore']);
    if($resultado=true){
        echo "<h1>Puntuacion grabada</h1>";
    }else{
        echo "<h1>Puntuacion NO grabada</h1>";
    }
}

if (isset($_REQUEST['mostrarPuntuacionesGuardadas'])) {
    $datosPersonaje = $metodos->sacarPuntuacionesBaseDatos();
    $info = '';
    foreach ($datosPersonaje as $key) {
        $info .= $key['nombre_personaje'].', '.$key['clase_personaje'].', '.$key['puntos_personaje']; ?>
    <p><?php echo $info; ?></p>
<?php
    $info="";
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
    <h1>Grabar Puntuaciones</h1>
<?php

if(!isset($_REQUEST['charName'])){?>
<h3>Inventate una Puntuacion.</h3>
<form action="grabarPuntuacion.php">
    <input type="text" name="charFakeName" id="charFakeNane" placeholder="Nombre inventado">
    <input type="text" name="charFakeClass" id="charFakeClass" placeholder="Clase inventada">
    <input type="number" name="charFakeScore" id="charFakeScore" placeholder="Puntuacion inventada">
    <button type="submit" id="grabarPuntuacionFalsa" name="grabarPuntuacionFalsa">Grabar Puntuacion (Fake)</button>
</form>

<?php
}else{?>
<form action="grabarPuntuacion.php">
<input type="text" name="charName" id="charNane"  value="<?=$_REQUEST['charName']?>">
    <input type="text" name="charClass" id="charClass"  value="<?=$_REQUEST['charCass']?>">
    <input type="number" name="charScore" id="charScore"  value="<?=$_REQUEST['charScore']?>">
    <button type="submit" id="grabarPuntuacion" name="grabarPuntuacion">Grabar Puntuacion (Fake)</button>
</form>


<?php
}?>
<form action="grabarPuntuacion.php">
    <button type="submit" id="mostrarPuntuacionesGuardadas" name="mostrarPuntuacionesGuardadas">Mostrar Puntuaciones</button>
</form>


</body>
</html>