<?php

//echo "viene de una redirección.". "<br>";
//echo $_GET['nombre'];

// en php para redirección se usa "header ("location: nombredepagina.php");" parece que lo hace automáticamente
//con esto se envia tambien el parametro nombre por GET
header ("location:pagina2.php?nombre=juan");

//con esto se envia el parametro con GET pero VACIO
#header ("location:pagina2.php?nombre");