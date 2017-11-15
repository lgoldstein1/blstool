<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>chartTest</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="chartTest.js"></script>

</head>
<body>
<canvas id="myChart" width="400" height="400"></canvas>
<?php
$varUsed = $_GET["varname"];
function getRequest($seriesID, $entry, $attribute)
{
$varUsed = $_GET["varname"];
$seriesKeys = array(
    'CUUR0000SA0' => 'Consumer Price Index (Urban Consumers)',
    'CWUR0000SA0' => 'Consumer Price Index (Wage Earners)',
    'SUUR0000SA0' => 'Chained Consumer Price Index',
    'PCUOMFG--OMFG--' => 'Producer Price Index',
    'EIUIR' => 'Import Prices',
    'EIUIQ' => 'Export Prices',
    'CES0000000001' => 'National Employment (nonfarm, in thousands)',
    'LNS11300000' => 'Civilian Labor Force Participation Rate',
    'LNS11000000' => 'Civilian Labor Force Level (in thousands)',
    'JTS00000000HIR' => 'Hiring Rates',
    'LNS13000000' => 'Labor Force Unemployment Level',
    'LNS14000000' => 'Labor Force Unemployment Rate',
    'CIU1010000000000A' => 'Civilian Worker Compensation (% change over last 12 months)',
    'WSU001' => 'Work Stoppages (Days lost because of)',
    'LEU0252881500' => 'Median Weekly Earnings',
    'CES0500000003' => 'Total National Earnings (Average per hour)',
    'PRS84006092' => 'Labor Productivity Change (%)',
);
$seriesUsed = explode(',' , $seriesID);
$url = 'https://api.bls.gov/publicAPI/v2/timeseries/data/';
$method = 'POST';
$query = array(
    'seriesid' => $seriesUsed,
    'startyear' => '2007',
    'endyear' => '2016',
    'registrationkey' => '29215552940c4dc1817e10595963946c'
);
$pd = json_encode($query);
$contentType = 'Content-Type: application/json';
$contentLength = 'Content-Length: ' . strlen($pd);
$result = file_get_contents(
    $url, null, stream_context_create(
        array(
            'http' => array(
                'method' => $method,
                'header' => $contentType . "\r\n",
                'content' => $pd
            ),
        )
    )
);
$newresulta = json_decode($result, true);
$testresult = ($newresulta ['Results'] ['series']);
$newresulto = json_decode($result);
foreach($testresult as $value) {
    $currentSeries = $value['seriesID'];
    $currentside = 'placeholder';
    $topvar = array();
    $sidevar = array();
    $datavar = array();
    $datavalue = $value['data'];
    foreach ($datavalue as $list) {
        $sidecounter = 0;
        $datacounter = 0;
        $counter = 0;
        foreach ($list as $item) {
            if (gettype($item) == 'string' and $counter != 1) {
                //echo($item);
                //echo('<br>');
                switch ($counter) {
                    case 0:
                        if ($item != $currentside) {
                            array_unshift($sidevar, $item);
                            $currentside = $item;
                        }
                        break;
                    case 2:
                        if (!in_array($item, $topvar)) {
                            array_unshift($topvar, $item);
                        }
                        break;
                    case 3:
                       // print('##' . $item . '##');
                        array_unshift($datavar, $item);
                       // print("<br>");
                        //var_dump($datavar);
                }
            }
            $counter += 1;
        }
        //echo('<br>');
        $titleWidth = count($topvar) + 1;
    }}}
    ?>
    <script>
    var points = [];
    var xhr = new XMLHttpRequest();

    points.push({x: <?php echo (int) htmlspecialchars($_POST['xval']) ?>,
        y: <?php echo (int) htmlspecialchars($_POST['yval']) ?>});
    points.push({x: 7, y: 19});
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: 'points',
                fill: false,
                lineTension: 0
                data: [{
                    x: <?php echo (int) htmlspecialchars($_POST['xval']) ?>,
                    y: <?php echo (int) htmlspecialchars($_POST['yval']) ?>
                }, {
                    x: 15,
                    y: 10
                }]
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    type: 'linear',
                    position: 'bottom',
                    ticks: {
                        beginAtZero: true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Year'
                    }
                }],
                yAxes: [{
                    type: 'linear',
                    ticks: {
                        beginAtZero: true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }]
            }
        }
    });
</script>
</body>
</html>