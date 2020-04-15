<?php

?>

<html>
<ul>
    <!-- metiendo el valor de la variable con ?= se saca por pantalla al estar entre li  -->
    <?php for ($i = 1; $i <= 10; $i++) { ?>
        <li> <?= $i ?> </li>
    <?php } ?>
</ul>
<ul>
    <!-- echo con el valor de i para que salga por pantalla, bastante más sencillo -->

    <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<li>$i</li>";
        }

    ?>

</ul>
</html>