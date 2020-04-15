<?php

$fecha="24-03-2020";

#se formatea a americano
$fechaFormatoAmericano= date("Y-m-d", strtotime( $fecha));

echo $fecha . "<br>";
echo $fechaFormatoAmericano . "<br>";