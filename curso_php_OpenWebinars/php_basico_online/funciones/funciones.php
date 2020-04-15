<?php
#asi se declara una funcion "function" es palabra reservada
function holaMundo(){
    $variable1= "hola mundo!". "<br>";

    echo $variable1;
}

$variable2 = "Pasada por Valor";
#así esta pasada por valor la variable, osea que se modificara dentro de la funcion pero no se modificara.
function imprimirPorPantalla($variableAImprimir=null){

    echo "$variableAImprimir";
}

holaMundo();
imprimirPorPantalla($variable2);
#Aqui aun no se ha modificado, porque no ha pasado por la función.
$variable3=11;
echo "variable 3 pre metodo:" . $variable3. "<br>";

#en este metodo se pasa por REFERENCIA  con & lo que hace que la variable pase a ser modificada.
function incrementarEnUno(&$variableParaIncrementar){
    $variableParaIncrementar++;
    echo "variable 3 en metodo:" . $variableParaIncrementar. "<br>";
}
#se ha modificado a nivel global.
incrementarEnUno($variable3);

echo "variable 3 post metodo:" . $variable3. "<br>";


function incrementoEnUnoConReturn($variableParaIncrementar){
    $variableParaIncrementar++;
    return $variableParaIncrementar;
}

$variable4=incrementoEnUnoConReturn(12);
echo "varibale retornada: " . $variable4 ."<br>";


#FUNCIONES DE CADENA ARRAY

// LONGITUD DE CADENA

$cadena = "hola mundo";

echo strlen($cadena)."<br>";

//Substing, parte de una cadena

echo substr($cadena, 1, 8). "<br>";

//reemplazo

echo str_replace("o","p", $cadena). "<br>";

#Funciones de array

//explode, divide un string en array
$variableExplode=explode(" ", $cadena);
print_r($variableExplode);
echo "<br>";
print_r($variableExplode[0]. "<br>");

//implode, convierte arrays en strings.
$arrayToImplode= array('1', '2','3');
$stringImplode=implode(",", $arrayToImplode);

echo $stringImplode . "<br>";

//array_keys devuelve todas las claves de un array con claves

$arrayToGetKeys = array(
    '1' => "uno" ,
    '2' => "dos" ,
 );

 print_r(array_keys($arrayToGetKeys));
echo "<br>";
 //array merge junta arrays

 $arrayMerger1= array('1', '3');
 $arrayMerger2= array ('2','4'); 

 $arrayMerged=array_merge($arrayMerger1, $arrayMerger2);

 print_r($arrayMerged); 
 echo "<br>";

 #unset, borra la posicion de un array.

 unset ($arrayMerged[2]);
 print_r($arrayMerged); 
 echo "<br>";
