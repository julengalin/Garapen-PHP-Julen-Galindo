<?php
session_start();

//artxiboaren ubikazioa
$dataFile = 'survey_results.json';

//konprobatzen du existitzen badu eta aseguratzen du array bat bezala bueltatzen dituela  datuak
if (file_exists($dataFile)) {
    $surveyResults = json_decode(file_get_contents($dataFile), true);
} else {
    $surveyResults = ['bai' => 0, 'ez' => 0];
}

//berifikatzen du inkesta izenako atributoa dagola
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inkesta'])) {
    $response = $_POST['inkesta'];
    
    if (array_key_exists($response, $surveyResults)) {
        $surveyResults[$response]++;
    }
    //gorde erantzunak berriro JSONean
    file_put_contents($dataFile, json_encode($surveyResults));

    echo "<h1>Inkesta: Zure erantzuna gorde da.</h1>";
    echo "<p>Eskerrik asko inkestan parte hartzeagatik.</p>";
    echo '<a href="Inkesta.php">[Emaitzak]</a>';
    exit;
}

$totalVotes = array_sum($surveyResults);
$baiPercentage = $totalVotes > 0 ? round(($surveyResults['bai'] / $totalVotes) ) : 0;
$ezPercentage = $totalVotes > 0 ? round(($surveyResults['ez'] / $totalVotes)) : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkesta Emaitzak</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <h1>Inkesta: Inkestaren emaitzak</h1>
    <div style="max-width: 300px; margin: auto;">
        <canvas id="resultsChart"></canvas>
    </div>
    <script>
        const ctx = document.getElementById('resultsChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Bai', 'Ez'],
                datasets: [{
                    data: [<?php echo $surveyResults['bai']; ?>, <?php echo $surveyResults['ez']; ?>],
                    backgroundColor: ['green', 'red'],
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
    <p>Jasotako bozkak guztira: <?php echo $totalVotes; ?></p>
    <br>
    <a href="Inkesta.html">[Bueltatu bozkatzeko orrira]</a>
</body>

</html>