<?php

//echo "Pagina PHP redireccionada";

//print_r ($_GET);

#en php una redireccion entre paginas se hace con el metodo header();
#al igual que con html podemos enviar parametros con get en el método header

header("location:paginaRedir.php?name=".$_GET['name']);