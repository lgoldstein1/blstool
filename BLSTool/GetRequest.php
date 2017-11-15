<?php
function getRequest($seriesID, $entry, $attribute)
{
    $seriesUsed = explode(',' , $seriesID);
    $url = 'https://api.bls.gov/publicAPI/v2/timeseries/data/';
    $method = 'POST';
    $query = array(
        'seriesid' => $seriesUsed,
        'startyear' => '2015',
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
        $datavalue = $value['data'];
        foreach($datavalue as $list) {
            $counter = 0;
            foreach($list as $item) {
                if(gettype($item) == 'string' and $counter != 1) {
                    echo($item);
                    echo('<br>');
                }
                $counter +=1;
            }
            echo('<br>');
        }
    }
}
getRequest("CUUR0000SA0,CWUR0000SA0", 0, 'value');
?>