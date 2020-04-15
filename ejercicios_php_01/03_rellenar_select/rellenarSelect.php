<?php

$matriz = array(
    '1' => "Pepe",
    '2' => "Juan",
    '3' => "Vicentín",
);


function formarSelect($informacion)
{
    foreach ($informacion as $key => $value) {
        $html .= "<option value=" . $key . ">" . $value . "</option>";
    }

    return $html;
}

?>

<select name="select" id="select">
    <?php echo formarSelect($matriz); ?>
</select>