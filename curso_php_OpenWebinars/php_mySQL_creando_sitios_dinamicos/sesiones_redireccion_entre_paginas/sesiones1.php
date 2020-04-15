<?php

#se recoge en la variable $_SESSION

session_start();
echo $_SESSION['mi_sesion'] . "<br>";
#se almacenan en un array igual que get y post
print_r($_SESSION);
echo "<br>";
#además cada sesion tiene su id propio que se puede comprobar con el método session_id();
echo session_id();