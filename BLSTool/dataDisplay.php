<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="GetRequest.php"></script>
    <script type="text/javascript" src="AdvHome.js"></script>
    <title>Data Requested</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container" id="data">
    <h3>Data</h3>
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
            foreach($datavalue as $list) {
                $sidecounter = 0;
                $datacounter = 0;
                $counter = 0;
                foreach($list as $item) {
                    if(gettype($item) == 'string' and $counter != 1) {
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
                                array_unshift($datavar, $item);
                        }
                    }
                    $counter +=1;
                }
                //echo('<br>');
                $titleWidth = count($topvar) + 1;
            }
            ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th colspan="<?php echo($titleWidth); ?>"><?php echo($seriesKeys[$currentSeries]); ?></th>
            </tr>
            <tr><th></th>
                <?php
                foreach($topvar as $item) {
                    ?>
                    <th><?php echo($item); ?> </th>
                    <?php
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($sidevar as $item) {
                ?>
                <tr>
                    <td> <?php echo($item); ?> </td>
                    <?php
                    for($x = 0; $x < count($topvar); $x++) {
                        ?>
                        <td> <?php echo($datavar[$datacounter]); ?> </td>
                        <?php $datacounter++;
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
            <div id="csv">
                <h4>CSV Formatted</h4>
               <?php
               $fileName = 'dataCSV.txt';
               $csvLine = '';
               $current = file_get_contents($fileName);
               file_put_contents('data75.txt', '');
               echo($current);
               $current .= ",";
               echo(",");
               $datacounter = 0;
            foreach($topvar as $item) {
                $csvLine .= ($item . ',');
            }
            $csvLinestrip = rtrim($csvLine, ',');
            echo($csvLinestrip);
            echo("<br>");
            $current = ($csvLinestrip . "\r\n");
            file_put_contents('data75.txt', $current, FILE_APPEND);
            foreach($sidevar as $item) {
                $csvLine = "";
                $csvLine .= ($item . ',');
                for($x = 0; $x < count($topvar); $x++) {
                    $csvLine .= ($datavar[$datacounter] . ',');
                    $datacounter++;
                }
                $csvLinestrip = rtrim($csvLine, ',');
                echo($csvLinestrip);
                echo("<br>");
                $current = ($csvLinestrip . "\r\n");
                file_put_contents('data75.txt', $current, FILE_APPEND);
            }
            ?>
                <a class="btn btn-primary" href=data75.txt download="data75" id="csvDownload">
                    Click here to download this data!</a>
            </div>
            <?php
        }
    }
    getRequest($varUsed, 0, 'value');
    ?>

</div>
</body>
</html>