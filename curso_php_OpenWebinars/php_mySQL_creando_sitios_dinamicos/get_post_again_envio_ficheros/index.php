<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Formulario con GET. <br>
    <form method=get action= get_post.php>
    Nombre : <input type="text" name="usuario">
    <input type="submit" name="enviar" value="Enviar">
    </form>
    Formulario con POST.<br>
    <form method=post action= get_post.php>
    Nombre : <input type="text" name="usuario">
    <input type="submit" name="enviar" value="Enviar">
    </form>
    Ficheros con POST. <br>
    <form action="envio_de_ficheros.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fichero" id="Fichero">
        <input type="submit" name="enviar" value="Enviar">

    </form>

</body>
</html>