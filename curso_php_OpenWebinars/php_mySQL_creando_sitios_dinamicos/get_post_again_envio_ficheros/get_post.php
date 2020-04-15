<?php

//get y post se usan para mandar información entre páginas a través de formularios.
//get recoge en un array lo que se envia desde la otra página, lo recibe a través de la url

$_GET['usuario '];
echo "Todos los parametros Get:";
print_r($_GET);
echo "<br>";
echo "parametro específico Get.";
print_r($_GET['usuario']);
echo "<br>";

$_POST['usuario '];
echo "Todos los parametros Post:";
print_r($_POST);
echo "<br>";
echo "parametro específico Post.";
print_r($_POST['usuario']);