
<?php

    $ids = [1,2,3,4,5,6];
    $nombres=["pepe","juan","jose","ramon","pedrin", "guacamole"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<select name="selector" id="selector">
        <?php
            for ($i=0;$i<6;$i++){
                ?>
                <!--ESTO SE LO TRAGA TODO, LIKE RLY-->
                <option value= "<?php=$ids[$i].''.$nombres[$i]?>"><?php=$ids[$i].''.$nombres[$i]?></option>

            <?php }
        ?>
</select>
</body>
