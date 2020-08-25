<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Crea tu personaje</h1>
    <!-- Te da a elegir el tipo de personaje que quieres y escribes tu nombre para lanzarlo al randomizador de stats-->
    <form action="statsRandomizer.jsp" id="seleccionPersonaje">
    
        <input type="text" placeholder="Nombre:" name="nombrePersonaje" id="nombrePersonaje">
    
        <p>Choose your class: </p>
        <input type="radio" name="clasePersonaje" id="barbaro" value="barbaro">
        <label for="barbaro">Bárbaro</label>
        <br>
        <p> 
            Los Bárbaros son la principal linea de defensa de un grupo.<br>
            Tienden a ser lo primeros en entrar en combate o recibir los ataques enemigos.<br>
            Su nivel de inteligencia es bajo.<br>
            Características: Constitución + 2, Inteligencia - 2<br>
            Especialidades: Lucha cuerpo a cuerpo y armas pesadas.
        </p>
        <br>
        <input type="radio" name="clasePersonaje" id="mago" value="mago">
        <label for="mago">Mago</label>
        <br>
        <p>
            Los magos son de los guerreros más versatiles y pueden atacar a sus enemigos y curar a sus compañeros.<br>
            Sin embargo son vulnerables a ataques físicos, asique hay que tener cuidado<br>
            Características: Inteligencia + 2, Constitución - 2<br>
            Especialidades: Combate a distancia, curación.<br>
        </p>
        <br>
        <button type="submit" form="seleccionPersonaje">Generar estadisticas.</button>
    </form>

    



    <br>
    <p>Si tienes un personaje lo puedes cargar aquí. (si le pulsas peta, el resto funciona)</p>
    <form action="loadCharacter.jsp">
        <button type="submit">Cargar personaje</button>
    </form>
    
</body>
</html>