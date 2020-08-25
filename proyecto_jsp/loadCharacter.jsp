<%
Cookie [] allCookies= request.getCookies();

if (request.getCookies()!=null){
   if (allCookies.length==0){
        
            String [][] allCharacters= new String [allCookies.length][9];
    String [][] allCharacters= new String [allCookies.length][9];
   }
    String [] singleCharacter = new String [9];

    for (int i=0; i<=allCookies.length-1;i++){
        singleCharacter=allCookies[i].getValue().split("_");
        for(int i2=0;i2<singleCharacters[i].length;i2++){
            allCharacters[i][i2]=singleCharacter[i2];//aqui peta y out of bounds why?
        }
    }

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
  <%if (allCookies!=null){%>  
  <form action="recordCharacter.jsp">
      <% for (int i3=0; i3<allCharacters.length;i3++){ %>
      <input type="radio" name="chooseCharacter" value="<%=allCharacters[i3][1]%>">
      <%}%>
  </form>  
  <%}%>

  <%if (allCookies==null){%>  
    <form action="main.html">
        <p>YOU DO NOT HAVE A CHARACTER.</p>
        <button type="submit">Create One</button>
    </form>  
    <%}%>
</body>
</html>