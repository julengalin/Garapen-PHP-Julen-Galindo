<?php
$emaitza = 0;
if (isset($_POST["dirua"]) && isset($_POST["kantitatea"])) {
    $dirua = $_POST["dirua"];
    $kantitatea = floatval($_POST["kantitatea"]);

    if ($dirua == "amerikanoa") {
        $emaitza = $kantitatea * 1.08;
        echo "dolar amerikarren emaitza: " . $emaitza;
    } elseif ($dirua == "britania") {
        $emaitza = $kantitatea * 0.83;
        echo "libera britaniaren emaitza: " . $emaitza;
    } elseif ($dirua == "japon") { 
        $emaitza = $kantitatea * 164.3;
        echo " yen japoniaren emaitza: " . $emaitza;
    } elseif ($dirua == "suitza") { 
        $emaitza = $kantitatea * 0.94;
        echo "franko suitzaren emaitza: " . $emaitza;
    }else {
        echo "Forma ezezaguna.";
    }
} else {
    echo "Mesedez, kantitate eta moneda egokia erabili.";
}
echo"<br>[<a href ='FormularioDirua.html'>Itzuli</a>]";
?>
