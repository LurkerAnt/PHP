<?php
require_once('requires.php');
$charName=$_REQUEST['charName'];
$charClass=$_REQUEST['charClass'];
$charPower=$_REQUEST['charPower'];
$charHP=$_REQUEST['charHP'];
$personaje=new Personaje($charName,$charClass,$charPower,$charHP);
guardarPersonajeEnSesion($personaje);
/*echo $personaje->getName()."<br>";
echo $personaje->getClase()."<br>";
echo $personaje->getPoder()."<br>";
echo $personaje->getVida()."<br>";
Probaturas para ver si entraba hasta aqui*/
$conexionCrud=new metodos();
$resultado=$conexionCrud->grabarPersonajeEnBaseDatos($charName,$charClass,$charPower,$charHP);
if($resultado){
    echo ("<h1>Personaje Grabado Correctamente.</h1>");
}else{
    echo("<h1>Personaje NO grabado.</h1>");
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

<form action="battle.php">
        <input type="hidden" placeholder="Nombre" name="charName" id="charName" value="<?=$_SESSION['nombrePersonaje']?>">
        <input type="hidden" placeholder="Clase" name="charClass" id="charClass" value="<?=$_SESSION['clasePersonaje']?>">
        <input type="hidden" name="charPower" id="charPower" value="<?=$personaje->getPoder()?>"> <br>
        <input type="hidden" name="charHP" id="charHP" value="<?=$personaje->getVida()?>"> <br>    
        <button type="submit" name="crearPersonaje">Probar en Batalla</button>
</form>

<form action="index.php">
<button type="submit">Volver al inicio</button>
</form>

</body>
</html>


