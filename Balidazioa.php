<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $izenburua = $_POST['izenburua'] ?? '';
    $testua = $_POST['testua'] ?? '';
    $kategoria = $_POST['kategoria'] ?? '';
    $irudia = $_FILES['irudia'] ?? null;

    if (empty($izenburua) || empty($testua)) {
        echo "Izenburua eta testua derrigorrez bete behar dira.";
        exit;
    }

    if ($irudia && $irudia['error'] === UPLOAD_ERR_OK) {
        //Argazkiaren izena hartzen du
        $fitxategiIzena = basename($irudia['name']);

        $imageType = exif_imagetype($irudia['tmp_name']);
        if ($imageType === IMAGETYPE_GIF || $imageType === IMAGETYPE_JPEG || $imageType === IMAGETYPE_PNG) {
        //Konbinatzen du karpeta eta artxiboa
        $helburua = "irudiak/" . $fitxategiIzena;
        //Mugitzen du artxiboa esandako karpetara
        move_uploaded_file($irudia['tmp_name'], $helburua);
        //mugitzen du artxiboa
        $irudiEsteka = $helburua;
        }else {
            echo "Errorea: Fitxategia ez da onartutako irudi mota bat. <br>";
            exit;
            }    
    } else {
        $irudiEsteka = "Ez da irudirik igo.";
    }
    echo "<h1>Formularioaren emaitza</h1>";
    echo "Izenburua: " .$izenburua . "<br>";
    echo "Testua: " .$testua . "<br>";
    echo "Kategoria: " .$kategoria . "<br>";
    if ($irudiEsteka !== "Ez da irudirik igo.") {
        echo "Irudia: <a href='" .$irudiEsteka . "' download> " .$fitxategiIzena. "</a> <br>";
    } else {
        echo "Ez da irudirik igo. <br>";
    }
    echo"[<a href ='FormularioIrudia.html'>Datu berri bat gehitu</a>]";
}
?>