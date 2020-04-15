<?php

echo $_POST['nombre'];

print_r($_FILES);
//si no se mueve al server el archivo se queda en el limbo y se pierde, con esta sintaxis lo mueve a este directorio con el nombre original para currar con el.
move_uploaded_file($_FILES["fichero"]["tmp_name"], "/ficheros/". $_FILES["fichero"]["name"]);