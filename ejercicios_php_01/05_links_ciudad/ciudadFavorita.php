<?php
 $linkGoogle= "https://www.google.com/search?q=";

$ciudadFavorita=$_POST['ciudad'];

echo "Tu ciudad Favorita es : <a href=".$linkGoogle.$ciudadFavorita.">".$ciudadFavorita."</a><br>";
