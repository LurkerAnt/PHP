
<?php
    for ($i=1899;$i<2020;$i++){
        $link="https://www.google.com/search?q=";
        $link=$link.$i;
        ?> <a href="<?php $link ?>"><?php $i ?></a><?
    }
?>