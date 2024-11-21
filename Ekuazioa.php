<?php
$emaitza = 0;
if (isset($_POST["forma"]) && isset($_POST["erradioa"])) {
    $forma = $_POST["forma"];
    $erradioa = floatval($_POST["erradioa"]);

    if ($forma == "karratua") {
        $emaitza = $erradioa * $erradioa;
        echo "Karratuaren emaitza: " . $emaitza;
    } elseif ($forma == "triangelua") {
        $emaitza = $erradioa * 2 / 3;
        echo "Triangeluaren emaitza: " . $emaitza;
    } elseif ($forma == "zirkulua") { 
        $emaitza = $erradioa / (2 * pi());
        echo "Zirkuluaren emaitza: " . $emaitza;
    } else {
        echo "Forma ezezaguna.";
    }
} else {
    echo "Mesedez, forma eta erradioa bidali.";
}
echo"<br>[<a href ='FormularioRadio.html'>Itzuli</a>]";
?>
