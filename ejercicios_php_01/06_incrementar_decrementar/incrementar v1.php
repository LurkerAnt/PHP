<?php

//ejercicio realizado a pelo, a prueba error, mejorar en base a mm

function realizarCalculo()
{
    $reset = isset($_POST);
    if (!$reset) {
        $numeroIncremento = 0;
    } else if (!$reset) {     
            if (isset($_POST['incrementar'])) {
                $numeroIncremento += $_POST['numero'];
            } else if (isset($_POST['decrementar'])) {
                $numeroIncremento -= $_POST['numero'];
            }
    }

    return $numeroIncremento;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="incrementar.php" method="post">
        <input type="number" name="numero" id="numero" placeholder="<?php echo realizarCalculo() ?>">
        <input type="submit" value="incrementar">
        <input type="submit" value="decrementar">
    </form>
</body>

</html>