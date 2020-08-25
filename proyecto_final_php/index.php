<?php
    require_once('requires.php');
    $personaje=new Personaje("Nombre","Clase",0,0);
    guardarPersonajeEnSesion($personaje);
    if(isset($_REQUEST['resetStats'])){
    $personaje->setName($_REQUEST['charName']);
    $personaje->setClase($_REQUEST['charClass']);
    guardarPersonajeEnSesion($personaje);
    rollStats($personaje);
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <h1>Crea tu personaje</h1>
    <div id="container">

    <form action="index.php" id="creacionPersonaje">
        <p>Escribe el nombre de tu heroe:</p>
        <input type="text" placeholder="Nombre" name="charName" id="nombrePersonaje"id="container2" value="<?=$_SESSION['nombrePersonaje']?>">
        <p>Elige tu Clase: </p>
        <input type="text" placeholder="Clase" name="charClass" id="charClass" value="<?=$_SESSION['clasePersonaje']?>">
        <br><br>
        <label for="charPower">Poder:</label><br><input type="text" name="charPower" id="charPower" value="<?=$personaje->getPoder()?>"> <br>
        <br>
        <label for="charHP">Puntos de Vida:</label><br><input type="text" name="charHP" id="charHP" value="<?=$personaje->getVida()?>"> <br>
        <br>
        <button type="submit" name="resetStats" id="resetStats">Roll Stats</button>
        <!--Esto hace que en la sesion se guarden los datos anteriores por lo que al lanzarlo a la siguiente pagina hay que actualizar los datos de sesion.-->
    </form>

    <form action="personajeGuardado.php">
        <input type="hidden" placeholder="Nombre" name="charName" id="charName" value="<?=$_SESSION['nombrePersonaje']?>">
        <input type="hidden" placeholder="Clase" name="charClass" id="charClass" value="<?=$_SESSION['clasePersonaje']?>">
        <input type="hidden" name="charPower" id="charPower" value="<?=$personaje->getPoder()?>"> <br>
        <input type="hidden" name="charHP" id="charHP" value="<?=$personaje->getVida()?>"> <br>    
        <button type="submit" name="crearPersonaje">Record Character</button>
    </form>
    
    <br>
    <p>Si tienes un personaje cargalo.</p>
    <form action="cargarPersonaje.php">
        <button type="submit">Cargar personaje</button>
    </form>
    </div>
    

    
</body>
</html>