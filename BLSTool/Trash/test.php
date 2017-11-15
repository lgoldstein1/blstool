<?php

include "GetRequest.php";
getRequest("CUUR0000SA0", 0, 'value');


/*$list = "";
$list = "hello!";
$list .= "world!";
echo($list);
?>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Striped Rows</h2>
    <p>The .table-striped class adds zebra-stripes to a table:</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Firstname<?php
            echo($muffin);
                ?></th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php
            countup();
                ?></td>
            <td>Doe</td>
            <td>john@example.com</td>
        </tr>
        <tr>
            <td>Mary</td>
            <td>Moe</td>
            <td>mary@example.com</td>
        </tr>
        <tr>
            <td>July</td>
            <td>Dooley</td>
            <td>july@example.com</td>
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>


<?php
function getRequest($seriesID, $entry, $attribute)
{
    $url = 'https://api.bls.gov/publicAPI/v2/timeseries/data/';
    $method = 'POST';
    $query = array(
        'seriesid' => array($seriesID),
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
    $newresulto = json_decode($result);
    $newresultb = ($newresulta ['Results'] ['series'] [0] ['data']);
    //echo($newresulta ['Results'] ['series'] [0] ['data'] [$entry] [$attribute]);
    foreach($newresultb as $list) {
        foreach($list as $item) {
            if(gettype($item) == 'string') {
                echo($item);
            }
            echo('<br>');
        }
    }
}
//getRequest('CUUR0000SA0', 0, 'value');

function countup() {
    $i = 0;
    while ($i < 10) {
        if ($i % 2 == 0) {
            echo("$i <br>");
        }
        $i++;
    }
}*/

?>