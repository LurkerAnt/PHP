<?php
require_once ('requires.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<form action="battle.php" id="toBattle">    
    <label for="personajes">Personajes Disponibles</label><br>

    <select name="personajesDisponibles" id="personajes" form="toBattle">
        <label for="personaje">Elige Personaje</label>
        
        <?php
        $metodos=new metodos();
        $datosPersonaje=$metodos->sacarPersonajesBaseDatos();
        $sql="";
        foreach($datosPersonaje as $key){
            $sql.= $key['id_personaje'].", ". $key['nombre_personaje'].", ".$key['clase_personaje'].", ".$key['poder_personaje'].", ". $key['vida_personaje'];
             ?>
        <option value="<?=$key['id_personaje']?>"><?=$sql?> </option>

        <?php
        $sql="";
        }
        ?>
    </select>




    <button type="submit" name="crearPersonaje">AL TURRON</button>    
</form>   

    
</body>
</html>