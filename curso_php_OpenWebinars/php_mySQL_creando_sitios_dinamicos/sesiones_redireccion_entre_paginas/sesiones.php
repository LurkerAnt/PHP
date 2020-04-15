<?php

#las sesiones son uan forma de guardar datos que persista por toda la aplicación.
#así puedes mover datos entre scripts y entre paginas web hechas en php
#se trabaja con la variable $_SESSION['NOMBRE DE SESION']="VALOR DE LA SESION";
#LAS SESIONES HAY QUE INICIALIZARLAS CON UN MÉTODO(SESSION_START;) SINO NO FUNCIONA.

session_start();
$_SESSION['mi_sesion']="valor";

?>

<a href="sesiones1.php">A otra página.</a>