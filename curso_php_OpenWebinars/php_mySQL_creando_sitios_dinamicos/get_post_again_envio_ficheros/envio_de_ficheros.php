<?php

//esto se recive EXCLUSIVAMENTE POR POST, se puede almacenar en el servidor.
echo "<pre>";
print_r($_POST);

echo "<br>";
print_r($_POST['usuario']);

//el fichero se recoge con otra variable que se llama $_FILES, no con POST. 
//Esto muestra la información del file, por ahora esta en el limbo.

echo"<br>";
print_r($_FILES);