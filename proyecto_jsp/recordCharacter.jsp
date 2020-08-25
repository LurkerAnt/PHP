<%

String [] character = new String [9];
//graba datos en un string, se puede guardar en una cookie
String completeChar="";

for (int i=0; i<character.length;i++){
    completeChar+=character[i]+"_";
}


if (request.getParameter("completeInformation")!=null){
    Cookie charCookie = new Cookie("completeInformation", completeChar);
	cookie.setMaxAge(30 * 24 * 60 * 60); // 30 días.
    response.addCookie(charCookie);
    System.out.println(charCookie);
} else{

    //recojo todos los parámetros aqui. 

    character[0]=request.getParameter("name");
    character[1]=request.getParameter("charClassIs");
    character[2]=request.getParameter("statStrength");
    character[3]=request.getParameter("statDexterity");
    character[4]=request.getParameter("statConstitution");
    character[5]=request.getParameter("statCharisma");
    character[6]=request.getParameter("statIntelligence");
    character[7]=request.getParameter("statWisdom");
    character[8]=request.getParameter("statHitPoints");
    
}


%>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>This is Your Character</h1>

    <h3>Name: <%=character[0]%></h3><br>
    <h3>Class: <%=character[1]%></h3><br>
    <h3>Strength: <%=character[2]%></h3><br>
    <h3>Dexterity: <%=character[3]%></h3><br>
    <h3>Constitution: <%=character[4]%></h3><br>
    <h3>Charisma: <%=character[5]%></h3><br>
    <h3>Intelligence: <%=character[6]%></h3><br>
    <h3>Wisdom: <%=character[7]%></h3><br>
    <h3>Hit Points: <%=character[8]%></h3><br>

    <form action="combat.jsp">
        <input type="hidden" name="completeInfo" value="<%=completeChar%>">
        <button type="submit" name="fightMeBro">Test in Battle</button>
    </form>

    <form action="reordCharacter.jsp">
        <input type="hidden" name="completeInformation" value="<%=completeChar%>">
        <button type="submit" name="saveCharacterInformation">Save your Character</button>
    </form>

    <form action="main.html">
        
        <butt
    </form>

</body>

</html>