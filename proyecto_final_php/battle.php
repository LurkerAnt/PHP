<?php
include_once('requires.php');
$metodosCrud = new metodos();
$puntuacion=0;
if (isset($_REQUEST['personajesDisponibles'])) {
    $infoPersonaje = $metodosCrud->sacarPersonajePorId($_REQUEST['personajesDisponibles']);
    $personaje = new Personaje($infoPersonaje['nombre_personaje'], $infoPersonaje['clase_personaje'], $infoPersonaje['poder_personaje'], $infoPersonaje['vida_personaje']);
    $enemigo = Personaje::crearPersonajeEnemigo();
    $_SESSION['personajeBatalla'] = $personaje;
    $_SESSION['enemigoBatalla'] = $enemigo;
    $_SESSION['puntuacion'] = $puntuacion;
} else if (isset($_REQUEST['crearPersonaje'])) {
    $personaje = new Personaje($_REQUEST['charName'], $_REQUEST['charClass'], $_REQUEST['charPower'], $_REQUEST['charHP']);
    $enemigo = Personaje::crearPersonajeEnemigo();
    $_SESSION['personajeBatalla'] = $personaje;
    $_SESSION['enemigoBatalla'] = $enemigo;
    $_SESSION['puntuacion'] = $puntuacion;
} else if (isset($_REQUEST['jugarTurno'])){
    $personaje=$_SESSION['personajeBatalla'];
    $enemigo=$_SESSION['enemigoBatalla'];
} else if (isset($_REQUEST['keepPlaying'])){
    $personaje=$_SESSION['personajeBatalla'];
    $puntuacion=$_SESSION['puntuacion'];
    $enemigo=Personaje::crearPersonajeEnemigo();
    $_SESSION['enemigoBatalla'];
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
    <?php if ($personaje != null) { ?>
        <div>
            <p>Nombre: <?php echo $personaje->getName() ?></p>
            <p>Clase: <?php echo $personaje->getClase() ?></p>
            <p>Poder: <?php echo $personaje->getPoder() ?></p>
            <p>Vida: <?php echo $personaje->getVida() ?></p>
        </div>

    <?php
    } ?>
    <?php if ($personaje != null) { ?>
        <div>
            <p>Nombre: <?php echo $enemigo->getName() ?></p>
            <p>Clase: <?php echo $enemigo->getClase() ?></p>
            <p>Poder: <?php echo $enemigo->getPoder() ?></p>
            <p>Vida: <?php echo $enemigo->getVida() ?></p>
        </div>
    <?php
    } else { ?>
        <h1>No hay personajes para Pelear. Carga uno o vuelve al inicio.</h1>
        <form action="index.php">
            <button type="submit">Inicio</button>
        </form>
        <form action="cargarPersonaje.php">
            <button type="submit">Cargar Personaje</button>
        </form>
        <?php
    }

    if (isset($_REQUEST['jugarTurno'])) {
        $personaje = $_SESSION['personajeBatalla'];
        $enemigo = $_SESSION['enemigoBatalla'];
        $batalla = new Batalla($personaje, $enemigo);
        $resultado = $batalla->turnoCombate();
        if (1 === $resultado[0]) {
            if ($resultado[1] <= 0) {
                $puntuacion++;
                $personaje->setVida($personaje->getVida() + 10);
                $_SESSION['puntuacion']=$puntuacion;
                $_SESSION['personajeBatalla']=$personaje; ?>

                "<h1> Has ganado te curas 10HP</h1>
                <form action="battle.php">
                    <button type="submit" id="keepPlaying">Seguir Jugando</button>
                </form>
                <form action="grabarPuntuacionphp">
                    <button type="submit" id="grabarPuntuacion">Grabar Puntuacion</button>
                </form>
            <?php
            } else {
                $enemigo->setVida($resultado[1]); ?> 
                <p>Tu personaje gana el turno. Vida del enemigo:"<?php echo $enemigo->getVida(); ?></p>
            <?php $_SESSION['enemigoBatalla']=$enemigo;
            }
        } elseif (2 === $resultado[0]) {
            if (0 >= $resultado[1]) {
            ?><h1> Has perdido, eres un paquete.</h1>
                <form action="grabarPuntuacion.php">
                    <button type="submit" id="grabarPuntuacion">Grabar Puntuacion</button>
                </form>
            <?php
            } else {
                $personaje->setVida($resultado[1]); ?>
                <p>El enemigo gana el turno. Vida restante:"<?php echo $personaje->getVida(); ?></p>
    <?php       $_SESSION['personajeBatalla']=$personaje;
            }
        }

    } ?>
    <div>
        <form action="battle.php">
            <button type="submit" id="jugarTurno" name="jugarTurno">Jugar Turno</button>
        </form>
        
        <form action="grabarPuntuacion">
            <button type="submit" id="recordScore" >Grabar Puntuacion</button>
        </form>
    </div>


</body>

</html>