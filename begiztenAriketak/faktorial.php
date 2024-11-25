<?php
$emaitza = 1;
$kantitatea = floatval($_POST["zenbakia"]);
echo"Zenbakia: " .$kantitatea    . "<br>";
if (is_numeric($kantitatea) == true) {
    for ($i = 1; $i <= $kantitatea; $i++) { 
        $emaitza= $emaitza * $i;
        }   
        echo"Faktoriala: " .$emaitza . "<br>";     
    }else {
    echo "Mesedez,zenbaki oso bat jarri.";
}
echo"<br>[<a href ='faktoriala.html'>Itzuli</a>]";
?>